<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
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

        $invoiceItem = new InvoiceItem();
        $invoiceItem->invoice_id = $id;
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
            ->orderBy('created_at', 'desc')  // Sortowanie malejąco
            ->paginate(10);

        return view('admin.invoice.index', compact('invoices'));
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
        return view('admin.invoice.create', compact('create_client','clients', 'invoiceNumber', 'company', 'services', 'products'));
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
        $dueDate = $this->payment_term_to_due_date($request->input('payment_term'), $invoice->issue_date);

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
                // Tworzenie nowego obiektu klienta
                $client = new Client();
                $client->name = $request->input('buyer_name');
                $client->vat_number = $request->input('buyer_vat_number');
                $client->adress = $request->input('buyer_adress');
                $client->user_id = $user->id;
                $client->company_id = $user->company_id;

                // Przechowywanie danych w bazie
                $client->save();
            } catch (Exception) {
                // Jeśli nie da się utworzyć to połącz
                $client = Client::where('vat_number', $request->input('buyer_vat_number'))->where('company_id', $user->company_id)->first();
                $invoice->client_id = $client->id;
            }
        }

        // Zapisanie faktury
        $invoice->save();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('invoice')->with('success', 'Faktura została pomyślnie utworzona.');
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
        $dueDate = $this->payment_term_to_due_date($request->input('payment_term'), $invoice->issue_date);

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
                // Tworzenie nowego obiektu klienta
                $client = new Client();
                $client->name = $request->input('buyer_name');
                $client->vat_number = $request->input('buyer_vat_number');
                $client->adress = $request->input('buyer_adress');
                $client->user_id = $user->id;
                $client->company_id = $user->company_id;

                // Przechowywanie danych w bazie
                $client->save();
            } catch (Exception) {
                // Jeśli nie da się utworzyć to połącz
                $client = Client::where('vat_number', $request->input('buyer_vat_number'))->where('company_id', $user->company_id)->first();
                $invoice->client_id = $client->id;
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

        // Pobranie pliku PDF
        return $pdf->download('faktura' . $invoice_obj->id . '.pdf');
    }
}
