<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Mail\InvoiceMail;
use App\Models\Client;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use NumberToWords\NumberToWords;

class InvoiceController extends Controller
{
    /**
     * Zwraca kwotę słownie.
     */
    private function get_total_in_words($total)
    {
        $zlote = floor($total);
        $grosze = round(($total - $zlote) * 100);

        $numberToWords = new NumberToWords();

        // Generowanie dla złotych
        $numberTransformer = $numberToWords->getNumberTransformer('pl');
        $zloteSlownie = $numberTransformer->toWords($zlote);
        $groszeSlownie = $numberTransformer->toWords($grosze);

        // Ustawienie poprawnej formy dla złotych
        $zloteForm = $this->get_zlote_form($zlote);
        // Ustawienie poprawnej formy dla groszy
        $groszeForm = $this->get_grosze_form($grosze);

        return "$zloteSlownie $zloteForm $groszeSlownie $groszeForm";
    }

    /**
     * Zwraca odpowiednią formę słowa 'złoty' w zależności od liczby.
     */
    private function get_zlote_form($zlote)
    {
        if ($zlote == 1) {
            return "złoty";
        } elseif ($zlote % 10 >= 2 && $zlote % 10 <= 4 && ($zlote % 100 < 10 || $zlote % 100 >= 20)) {
            return "złote";
        } else {
            return "złotych";
        }
    }

    /**
     * Zwraca odpowiednią formę słowa 'grosz' w zależności od liczby.
     */
    private function get_grosze_form($grosze)
    {
        if ($grosze == 1) {
            return "grosz";
        } elseif ($grosze % 10 >= 2 && $grosze % 10 <= 4 && ($grosze % 100 < 10 || $grosze % 100 >= 20)) {
            return "grosze";
        } else {
            return "groszy";
        }
    }

    /**
     * Zwraca obiekt firmy zalogowanego użytkownika.
     */
    private function get_invoice_number()
    {
        // Pobierz aktualny miesiąc i rok
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        // Znajdź ostatnią fakturę, aby określić autoinkrementację
        $lastInvoice = Invoice::where('company_id', $this->get_company_id())->orderBy('id', 'desc')->first();

        if ($lastInvoice) {
            // Pobierz numer z poprzedniej faktury i zwiększ go o 1
            $lastNumber = explode('/', $lastInvoice->number)[0];
            $newNumber = intval($lastNumber) + 1;
        } else {
            // Jeśli nie ma wcześniejszych faktur, rozpocznij od 1
            $newNumber = 1;
        }

        // Utwórz nowy numer faktury
        return sprintf('%d/%s/%s', $newNumber, $month, $year);
    }

    /**
     * Zamienia termin płatności typu string na datę
     */
    private function payment_term_to_due_date($paymentTerm, $issue_date)
    {
        // Wyciągamy liczbę dni z terminu płatności (zakładając format 'X_dni')
        $days = intval(explode('_', $paymentTerm)[0]);

        // Obliczamy datę płatności na podstawie issue_date + $days
        return Carbon::parse($issue_date)->addDays($days);
    }

    /**
     * Zamienia datę płatności na termin płatności typu string
     */
    private function due_date_to_payment_term($issue_date, $due_date)
    {
        // Obliczamy różnicę w dniach między due_date a issue_date
        $daysDifference = Carbon::parse($due_date)->diffInDays(Carbon::parse($issue_date));

        // Przygotowujemy dostępne opcje terminów płatności
        $availableTerms = [0 => 'natychmiast', 1 => '1_dzien', 3 => '3_dni', 7 => '7_dni', 14 => '14_dni', 30 => '30_dni', 60 => '60_dni', 90 => '90_dni'];

        // Szukamy odpowiedniego terminu płatności
        if (array_key_exists($daysDifference, $availableTerms)) {
            return $availableTerms[$daysDifference];
        }

        // Jeśli liczba dni nie pasuje do dostępnych opcji, zwracamy 'niestandardowy'
        return 'niestandardowy';
    }

    /**
     * Zamienia termin płatności typu string na datę
     */
    private function item_create($item, $id)
    {
        // Obliczanie wartości netto pozycji (quantity * unit_price)
        $itemSubtotal = $item['quantity'] * $item['price'];

        // Obliczanie VAT (jeśli nie jest 'zw' czyli zwolnione z VAT)
        if ($item['vat'] != 'zw') {
            $vatRate = floatval($item['vat']); // np. 23% VAT
            $itemVatAmount = $itemSubtotal * ($vatRate / 100);
        } else {
            $itemVatAmount = 0;
        }

        try {
            $product = Product::where('id', $item['product_id'])->first();
            $product->magazine = $product->magazine - $item['quantity'];
            $product->save();
        } catch (Exception) {
        }

        $invoiceItem = new InvoiceItem();
        $invoiceItem->invoice_id = $id;
        $invoiceItem->product_id = $item['product_id'];
        $invoiceItem->service_id = $item['service_id'];
        $invoiceItem->name = $item['name'];
        $invoiceItem->quantity = $item['quantity'];
        $invoiceItem->unit_price = $item['price'];
        $invoiceItem->subtotal = $itemSubtotal;
        $invoiceItem->vat_rate = $item['vat'] != 'zw' ? $item['vat'] : 0;
        $invoiceItem->vat_amount = $itemVatAmount;

        // Wartość brutto pozycji (subtotal + VAT)
        $itemTotal = $itemSubtotal + $itemVatAmount;
        $invoiceItem->total = $itemTotal;

        // Zapis pozycji faktury
        $invoiceItem->save();

        return [
            'itemSubtotal' => $itemSubtotal,
            'itemVatAmount' => $itemVatAmount,
            'itemTotal' => $itemTotal,
        ];
    }

    /**
     * Pokazuje faktury od najnowszych.
     */
    public function index()
    {
        // Sortowanie po 'created_at' malejąco (od najnowszych)
        $invoices = Invoice::where('company_id', $this->get_company_id())
            ->orderBy('issue_date', 'desc')  // Sortowanie malejąco
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Pobieranie tylko pierwszych 10 faktur z sugestii, sortowanie po 'updated_at'
        $invoices_sugestion = Invoice::where('company_id', $this->get_company_id())
            ->orderBy('updated_at', 'desc')  // Sortowanie malejąco
            ->take(10)                       // Pobranie tylko pierwszych 10 rekordów
            ->get();

        $invoices_all =  Invoice::where('company_id', $this->get_company_id())
            ->orderBy('created_at', 'desc')  // Sortowanie malejąco
            ->get();

        return view('admin.invoice.index', compact('invoices', 'invoices_sugestion', 'invoices_all'));
    }
    /**
     * Pokazuje faktury z aktualnego miesiąca od najnowszych.
     */
    public function index_now()
    {
        $currentMonth = now()->month; // Pobiera bieżący miesiąc
        $currentYear = now()->year;   // Pobiera bieżący rok

        // Sortowanie faktur po 'created_at' malejąco (od najnowszych), tylko dla bieżącego miesiąca i roku
        $invoices = Invoice::where('company_id', $this->get_company_id())
            ->whereMonth('issue_date', $currentMonth)  // Tylko bieżący miesiąc
            ->whereYear('issue_date', $currentYear)    // Tylko bieżący rok
            ->orderBy('issue_date', 'desc')            // Sortowanie malejąco
            ->orderBy('created_at', 'desc')
            ->paginate(10);                            // Paginacja

        // Pobieranie tylko pierwszych 10 faktur z sugestii, sortowanie po 'updated_at'
        $invoices_sugestion = Invoice::where('company_id', $this->get_company_id())
            ->orderBy('updated_at', 'desc')  // Sortowanie malejąco
            ->take(10)                       // Pobranie tylko pierwszych 10 rekordów
            ->get();

        $invoices_all =  Invoice::where('company_id', $this->get_company_id())
            ->orderBy('created_at', 'desc')  // Sortowanie malejąco
            ->get();

        return view('admin.invoice.index', compact('invoices', 'invoices_sugestion', 'invoices_all'));
    }
    /**
     * Pokazuje faktury z poprzedniego miesiąca od najnowszych.
     */
    public function index_last()
    {
        // Pobierz datę dla poprzedniego miesiąca
        $previousMonth = now()->subMonth()->month;  // Poprzedni miesiąc
        $previousMonthYear = now()->subMonth()->year;  // Rok poprzedniego miesiąca

        // Sortowanie faktur po 'created_at' malejąco (od najnowszych), tylko dla poprzedniego miesiąca i odpowiedniego roku
        $invoices = Invoice::where('company_id', $this->get_company_id())
            ->whereMonth('issue_date', $previousMonth)  // Tylko poprzedni miesiąc
            ->whereYear('issue_date', $previousMonthYear)  // Rok poprzedniego miesiąca
            ->orderBy('issue_date', 'desc')  // Sortowanie malejąco
            ->orderBy('created_at', 'desc')
            ->paginate(10);  // Paginacja


        // Pobieranie tylko pierwszych 10 faktur z sugestii, sortowanie po 'updated_at'
        $invoices_sugestion = Invoice::where('company_id', $this->get_company_id())
            ->orderBy('updated_at', 'desc')  // Sortowanie malejąco
            ->take(10)                       // Pobranie tylko pierwszych 10 rekordów
            ->get();

        $invoices_all =  Invoice::where('company_id', $this->get_company_id())
            ->orderBy('created_at', 'desc')  // Sortowanie malejąco
            ->get();

        return view('admin.invoice.index', compact('invoices', 'invoices_sugestion', 'invoices_all'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Wyszukiwanie faktur na podstawie numeru lub klienta
        $invoices = Invoice::where('company_id', $this->get_company_id())
            ->where(function ($q) use ($query) {
                $q->where('number', 'like', "%{$query}%")
                    ->orWhereHas('client', function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%");
                    });
            })
            ->orderBy('created_at', 'desc')
            ->take(10) // Pobranie maksymalnie 10 wyników
            ->get();

        // Zwracamy faktury jako JSON
        return response()->json($invoices);
    }


    /**
     * Pokazuje fakturę.
     */
    public function show(Invoice $invoice)
    {
        $invoice_obj = $invoice;
        $invoiceItems = InvoiceItem::where('invoice_id', $invoice_obj->id)->get();
        return view('admin.invoice.show', compact('invoice', 'invoice_obj', 'invoiceItems'));
    }
    /**
     * Pokazuje formularz tworzenia nowej faktury.
     */
    public function create()
    {
        $clients = Client::where('company_id', $this->get_company_id())->get();
        $services = Service::where('company_id', $this->get_company_id())->get();
        $products = Product::where('company_id', $this->get_company_id())->get();
        $invoiceNumber = $this->get_invoice_number();
        $company = $this->get_company();
        return view('admin.invoice.create', compact('clients', 'invoiceNumber', 'company', 'services', 'products'));
    }
    /**
     * Pokazuje formularz tworzenia nowej faktury.
     */
    public function create_client(Client $client)
    {
        $create_client = $client;
        $clients = Client::where('company_id', $this->get_company_id())->get();
        $services = Service::where('company_id', $this->get_company_id())->get();
        $products = Product::where('company_id', $this->get_company_id())->get();
        $invoiceNumber = $this->get_invoice_number();
        $company = $this->get_company();
        return view('admin.invoice.create', compact('create_client', 'clients', 'invoiceNumber', 'company', 'services', 'products'));
    }
    /**
     * Zapisuje formularz tworzenia nowej faktury.
     */
    public function store(Request $request)
    {
        // Zapis faktury do tabeli 'invoices'
        $invoice = new Invoice();

        // Inicjalizacja zmiennych do obliczeń
        $subtotal = 0;
        $vatAmount = 0;
        $total = 0;

        // Obliczanie terminu płatności
        $dueDate = $this->payment_term_to_due_date($request->input('payment_term'), $request->input('issue_date'));

        // Zapisuje pusty numer konta
        if ($request->input('bank') == null) {
            $bank = '';
        } else {
            $bank = $request->input('bank');
        }
        $user = User::where('id', auth()->id())->first();
        // Ustawiamy obliczoną datę jako termin płatności
        $invoice->due_date = $dueDate;
        $invoice->number = $request->input('number');
        $invoice->invoice_type = $request->input('invoice_type');
        $invoice->issue_date = $request->input('issue_date');
        $invoice->company_id = $request->input('company_id');
        $invoice->client_id = $request->input('client_id');
        $invoice->seller_name = $request->input('seller_name');
        $invoice->seller_adress = $request->input('seller_adress');
        $invoice->seller_tax_id = $request->input('seller_vat_number');
        $invoice->seller_bank = $bank;
        $invoice->buyer_name = $request->input('buyer_name');
        $invoice->buyer_adress = $request->input('buyer_adress');
        $invoice->buyer_tax_id = $request->input('buyer_vat_number');
        $invoice->payment_method = $request->input('payment_method');
        $invoice->notes = $request->input('notes');
        $invoice->subtotal = $subtotal;
        $invoice->vat = $vatAmount;
        $invoice->total = $total;
        $invoice->user_id = $user->id;
        $invoice->save();

        // Zapis pozycji faktury do tabeli 'invoice_items'
        foreach ($request->input('items') as $item) {
            $totals = $this->item_create($item, $invoice->id);

            // Dodawanie wartości pozycji do sumy faktury
            $subtotal += $totals['itemSubtotal'];
            $vatAmount += $totals['itemVatAmount'];
            $total += $totals['itemTotal'];
        }

        // Zapisanie obliczonych wartości do faktury
        $invoice->subtotal = $subtotal;
        $invoice->vat = $vatAmount;
        $invoice->total = $total;

        // Zamiana kwoty na słownie i zapis do faktury
        $invoice->total_in_words = $this->get_total_in_words($total);

        // Pobierz informacje o zalogowanym użytkowniku
        $user = User::where('id', auth()->id())->first();

        // Jeśli nie ma klienta połączonego spróbuj utworzyć
        if ($request->input('client_id') == null) {
            try {
                // Jeśli nie da się utworzyć to połącz
                $client = Client::where('vat_number', $request->input('buyer_vat_number'))->where('company_id', $user->company_id)->first();
                $invoice->client_id = $client->id;
            } catch (Exception) {
            }
        }

        // Zapisanie faktury
        $invoice->save();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('invoice')->with('success', 'Faktura została pomyślnie utworzona.');
    }

    /**
     * Zapisuje nową fakturę sprzedażową.
     */
    public function store_from(Invoice $invoice)
    {
        // Zapis faktury sprzedażowej na podstawie proformy
        $invoice_new_record = new Invoice();

        $user = User::where('id', auth()->id())->first();
        $invoice_new_record->due_date = $invoice->due_date;
        $invoice_new_record->number = $invoice->number;
        $invoice_new_record->invoice_type = 'faktura sprzedażowa'; // Zmieniamy typ faktury na sprzedażową
        $invoice_new_record->issue_date = $invoice->issue_date;
        $invoice_new_record->company_id = $invoice->company_id;
        $invoice_new_record->client_id = $invoice->client_id;
        $invoice_new_record->seller_name = $invoice->seller_name;
        $invoice_new_record->seller_adress = $invoice->seller_adress;
        $invoice_new_record->seller_tax_id = $invoice->seller_tax_id;
        $invoice_new_record->seller_bank = $invoice->seller_bank;
        $invoice_new_record->buyer_name = $invoice->buyer_name;
        $invoice_new_record->buyer_adress = $invoice->buyer_adress;
        $invoice_new_record->buyer_tax_id = $invoice->buyer_tax_id;
        $invoice_new_record->payment_method = $invoice->payment_method;
        $invoice_new_record->notes = $invoice->notes;
        $invoice_new_record->subtotal = $invoice->subtotal;
        $invoice_new_record->vat = $invoice->vat;
        $invoice_new_record->total = $invoice->total;
        $invoice_new_record->user_id = $user->id;
        $invoice_new_record->total_in_words = $invoice->total_in_words;

        // Zapisanie nowego rekordu faktury sprzedażowej
        $invoice_new_record->save();

        // Przypisanie ID nowej faktury do starej (proforma)
        $invoice->invoice_id = $invoice_new_record->id;
        $invoice->save();

        // Przypisanie ID proformy do nowo utworzonej faktury sprzedażowej
        $invoice_new_record->invoice_id = $invoice->id;
        $invoice_new_record->save();

        // Zapis pozycji faktury do tabeli 'invoice_items'
        $invoice_items = InvoiceItem::where('invoice_id', $invoice->id)->get();
        foreach ($invoice_items as $item) {
            $item_new_record = new InvoiceItem();
            $item_new_record->invoice_id = $invoice_new_record->id; // Przypisanie pozycji do nowej faktury sprzedażowej
            $item_new_record->product_id = $item->product_id;
            $item_new_record->service_id = $item->service_id;
            $item_new_record->name = $item->name;
            $item_new_record->quantity = $item->quantity;
            $item_new_record->unit_price = $item->unit_price;
            $item_new_record->subtotal = $item->subtotal;
            $item_new_record->vat_rate = $item->vat_rate;
            $item_new_record->vat_amount = $item->vat_amount;
            $item_new_record->total = $item->total;

            // Zapisanie pozycji nowej faktury sprzedażowej
            $item_new_record->save();
        }

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('invoice')->with('success', 'Faktura sprzedażowa została pomyślnie utworzona na podstawie proformy.');
    }

    /**
     * Pokazuje formularz edycji faktury.
     */
    public function edit(Invoice $invoice)
    {
        //return redirect()->route('invoice')->with('fail', 'Tymczasowo niedostępne.');
        $services = Service::where('company_id', $this->get_company_id())->get();
        $products = Product::where('company_id', $this->get_company_id())->get();


        $clients = Client::where('company_id', $this->get_company_id())->get();
        $company = $this->get_company();
        $items = InvoiceItem::where('invoice_id', $invoice->id)->get();
        $payment_term = $this->due_date_to_payment_term($invoice->issue_date, $invoice->due_date);
        return view('admin.invoice.edit', compact('payment_term', 'clients', 'invoice', 'company', 'items', 'services', 'products'));
    }

    /**
     * Aktualizuje formularz faktury.
     */
    public function update(Request $request, Invoice $invoice)
    {
        // Inicjalizacja zmiennych do obliczeń
        $subtotal = 0;
        $vatAmount = 0;
        $total = 0;

        //obliczanie terminu płatności
        $dueDate = $this->payment_term_to_due_date($request->input('payment_term'), $request->input('issue_date'));

        // Zapisuje pusty numer konta
        if ($request->input('bank') == null) {
            $bank = '';
        } else {
            $bank = $request->input('bank');
        }

        // Ustawiamy obliczoną datę jako termin płatności
        $invoice->due_date = $dueDate;
        $invoice->number = $request->input('number');
        $invoice->invoice_type = $request->input('invoice_type');
        $invoice->issue_date = $request->input('issue_date');
        $invoice->client_id = $request->input('client_id');
        $invoice->seller_name = $request->input('seller_name');
        $invoice->seller_adress = $request->input('seller_adress');
        $invoice->seller_tax_id = $request->input('seller_vat_number');
        $invoice->seller_bank = $bank;
        $invoice->buyer_name = $request->input('buyer_name');
        $invoice->buyer_adress = $request->input('buyer_adress');
        $invoice->buyer_tax_id = $request->input('buyer_vat_number');
        $invoice->payment_method = $request->input('payment_method');
        $invoice->notes = $request->input('notes');
        $invoice->subtotal = $subtotal;
        $invoice->vat = $vatAmount;
        $invoice->total = $total;
        $invoice->save();

        // Usunięcie istniejących pozycji faktury, aby zapisać nowe
        InvoiceItem::where('invoice_id', $invoice->id)->delete();

        // Zapis pozycji faktury do tabeli 'invoice_items'
        foreach ($request->input('items') as $item) {
            $totals = $this->item_create($item, $invoice->id);

            // Dodawanie wartości pozycji do sumy faktury
            $subtotal += $totals['itemSubtotal'];
            $vatAmount += $totals['itemVatAmount'];
            $total += $totals['itemTotal'];
        }

        // Zapisanie obliczonych wartości do faktury
        $invoice->subtotal = $subtotal;
        $invoice->vat = $vatAmount;
        $invoice->total = $total;

        // Zamiana kwoty na słownie i zapis do faktury
        $invoice->total_in_words = $this->get_total_in_words($total);

        // Pobierz informacje o zalogowanym użytkowniku
        $user = User::where('id', auth()->id())->first();

        // Jeśli nie ma klienta połączonego spróbuj utworzyć
        if ($request->input('client_id') == null) {
            try {
                // Jeśli nie da się utworzyć to połącz
                $client = Client::where('vat_number', $request->input('buyer_vat_number'))->where('company_id', $user->company_id)->first();
                $invoice->client_id = $client->id;
            } catch (Exception) {
            }
        }

        // Zapisanie faktury
        $invoice->save();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('invoice')->with('success', 'Faktura została pomyślnie zaktualizowana.');
    }

    /**
     * Usuwa fakturę z pozycjami.
     */
    public function delete(Invoice $invoice)
    {
        // Usuń powiązane pozycje faktury
        $invoice->items()->delete();

        // Usuń fakturę
        $invoice->delete();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('invoice')->with('success', 'Faktura została pomyślnie usunięta.');
    }

    /**
     * Pokazuje fakturę z pozycjami to co później trafia do pdf.
     */
    public function file(Invoice $invoice)
    {
        $invoice_obj = $invoice;
        $items = InvoiceItem::where('invoice_id', $invoice_obj->id)->get();

        $invoice = [
            'number' => $invoice_obj->number,
            'invoice_type' => $invoice_obj->invoice_type,
            'issue_date' => $invoice_obj->issue_date,
            'due_date' => $invoice_obj->due_date,
            'status' => $invoice_obj->status,
            'client' => [
                'name' => $invoice_obj->buyer_name,
                'address' => $invoice_obj->buyer_adress,
                'tax_id' => $invoice_obj->seller_tax_id
            ],
            'items' => $items,
            'seller' => [
                'name' => $invoice_obj->seller_name,
                'address' => $invoice_obj->seller_adress,
                'tax_id' => $invoice_obj->seller_tax_id,
                'bank' => $invoice_obj->seller_bank
            ],
            'subtotal' => $invoice_obj->subtotal,
            'vat' => $invoice_obj->vat,
            'total' => $invoice_obj->total,
            'notes' => $invoice_obj->notes,
            'payment_method' => $invoice_obj->payment_method,
            'total_in_words' => $invoice_obj->total_in_words
        ];
        return view('admin.template.invoice', compact('invoice'));
    }

    /**
     * Pobiera fakturę z pozycjami w pdf.
     */
    public function download($invoice)
    {
        $invoice_str = $invoice;
        $items = InvoiceItem::where('invoice_id', $invoice_str)->get();
        $invoice_obj = Invoice::where('id', $invoice_str)->first();
        $invoice = [
            'number' => $invoice_obj->number,
            'invoice_type' => $invoice_obj->invoice_type,
            'issue_date' => $invoice_obj->issue_date,
            'due_date' => $invoice_obj->due_date,
            'status' => $invoice_obj->status,
            'client' => [
                'name' => $invoice_obj->buyer_name,
                'address' => $invoice_obj->buyer_adress,
                'tax_id' => $invoice_obj->seller_tax_id
            ],
            'items' => $items,
            'seller' => [
                'name' => $invoice_obj->seller_name,
                'address' => $invoice_obj->seller_adress,
                'tax_id' => $invoice_obj->seller_tax_id,
                'bank' => $invoice_obj->seller_bank
            ],
            'subtotal' => $invoice_obj->subtotal,
            'vat' => $invoice_obj->vat,
            'total' => $invoice_obj->total,
            'notes' => $invoice_obj->notes,
            'payment_method' => $invoice_obj->payment_method,
            'total_in_words' => $invoice_obj->total_in_words
        ];

        // Generowanie PDF
        $invoiceNumber = str_replace([' ', '/'], '-', $invoice_obj->number);
        $pdf = PDF::loadView('admin.template.invoice', compact('invoice'));

        // Pobranie pliku PDF
        return $pdf->download('faktura-'.$invoice_obj->seller_name.'-' . $invoiceNumber . '.pdf');
    }
    public function send_invoice(Invoice $invoice)
    {
        // Weryfikacja, czy klient ma adres e-mail
        if ($invoice->client->email == null && $invoice->client->email2 == null) {
            return redirect()->back()->with('fail', 'Klient nie ma adresu e-mail do wysłania faktury.');
        }

        $items = InvoiceItem::where('invoice_id', $invoice->id)->get();
        $invoice_obj = Invoice::where('id', $invoice->id)->first();
        $invoice = [
            'number' => $invoice_obj->number,
            'invoice_type' => $invoice_obj->invoice_type,
            'issue_date' => $invoice_obj->issue_date,
            'due_date' => $invoice_obj->due_date,
            'status' => $invoice_obj->status,
            'client' => [
                'name' => $invoice_obj->buyer_name,
                'address' => $invoice_obj->buyer_adress,
                'tax_id' => $invoice_obj->seller_tax_id
            ],
            'items' => $items,
            'seller' => [
                'name' => $invoice_obj->seller_name,
                'address' => $invoice_obj->seller_adress,
                'tax_id' => $invoice_obj->seller_tax_id,
                'bank' => $invoice_obj->seller_bank
            ],
            'subtotal' => $invoice_obj->subtotal,
            'vat' => $invoice_obj->vat,
            'total' => $invoice_obj->total,
            'notes' => $invoice_obj->notes,
            'payment_method' => $invoice_obj->payment_method,
            'total_in_words' => $invoice_obj->total_in_words
        ];

        // Generowanie PDF
        $pdf = PDF::loadView('admin.template.invoice', compact('invoice'));

        // Wysłanie e-maila z załącznikiem
        try {
            Mail::to($invoice_obj->client->email)->send(new InvoiceMail($invoice_obj, $pdf));
        } catch (Exception) {

        }
        try {
            Mail::to($invoice_obj->client->email2)->send(new InvoiceMail($invoice_obj, $pdf));
        } catch (Exception) {

        }

        return redirect()->back()->with('success', 'Faktura została wysłana pomyślnie!');
    }
}
