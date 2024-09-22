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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class InvoiceController extends Controller
{
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
     * Pokazuje faktury.
     */
    public function index()
    {
        $invoices = Invoice::where('company_id', $this->get_company_id())->paginate(10);
        return view('admin.invoice.index', compact('invoices'));
    }

    /**
     * Pokazuje fakturę.
     */
    public function show(Invoice $invoice)
    {
        $invoice_obj = $invoice;
        return view('admin.invoice.show', compact('invoice', 'invoice_obj'));
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

        //obliczanie terminu płatności
        $dueDate = $this->payment_term_to_due_date($request->input('payment_term'), $invoice->issue_date);

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
        $invoice->seller_bank = $request->input('bank');
        $invoice->buyer_name = $request->input('buyer_name');
        $invoice->buyer_adress = $request->input('buyer_adress');
        $invoice->buyer_tax_id = $request->input('buyer_vat_number');
        $invoice->payment_method = $request->input('payment_method');
        $invoice->notes = $request->input('notes');
        $invoice->subtotal = $subtotal;
        $invoice->vat = $vatAmount;
        $invoice->total = $total;
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

        $invoice->save();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('invoice')->with('success', 'Faktura została pomyślnie utworzona.');
    }

    /**
     * Pokazuje formularz edycji faktury.
     */
    public function edit(Invoice $invoice)
    {
        return redirect()->route('invoice')->with('fail', 'Tymczasowo niedostępne.');
        
        $clients = Client::where('company_id', $this->get_company_id())->get();
        $company = $this->get_company();
        $items = InvoiceItem::where('invoice_id', $invoice->id)->get();
        return view('admin.invoice.edit', compact('clients', 'invoice', 'company', 'items'));
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
        $invoice->seller_bank = $request->input('bank');
        $invoice->buyer_name = $request->input('buyer_name');
        $invoice->buyer_adress = $request->input('buyer_adress');
        $invoice->buyer_tax_id = $request->input('buyer_vat_number');
        $invoice->payment_method = $request->input('payment_method');
        $invoice->notes = $request->input('notes');

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

        // Zapisanie zaktualizowanej faktury
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
            'payment_method' => $invoice_obj->payment_method
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
            'payment_method' => $invoice_obj->payment_method
        ];

        // Generowanie PDF
        $pdf = PDF::loadView('admin.template.invoice', compact('invoice'));

        // Pobranie pliku PDF
        return $pdf->download('faktura' . $invoice_obj->id . '.pdf');
    }
}
