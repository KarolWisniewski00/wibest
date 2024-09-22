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

class InvoiceController extends Controller
{
    /**
     * Pokazuje klientów.
     */
    public function index()
    {
        // Pobranie identyfikatora zalogowanego użytkownika
        $userId = auth()->id();

        // Pobranie informacji o firmie zalogowanego użytkownika
        $userCompany = User::find($userId)->company_id;

        $invoices = Invoice::where('company_id', $userCompany)->paginate(10);

        return view('admin.invoice.index', compact('invoices'));
    }
    /**
     * Pokazuje formularz tworzenia nowego klienta.
     */
    public function create()
    {
        // Pobranie identyfikatora zalogowanego użytkownika
        $userId = auth()->id();

        // Pobranie informacji o firmie zalogowanego użytkownika
        $userCompany = User::find($userId)->company_id;
        $clients = Client::where('company_id', $userCompany)->get();
        $services = Service::all();
        $products = Product::all();
        // Pobierz aktualny miesiąc i rok
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        // Znajdź ostatnią fakturę, aby określić autoinkrementację
        $lastInvoice = Invoice::orderBy('id', 'desc')->first();

        if ($lastInvoice) {
            // Pobierz numer z poprzedniej faktury i zwiększ go o 1
            $lastNumber = explode('/', $lastInvoice->number)[0];
            $newNumber = intval($lastNumber) + 1;
        } else {
            // Jeśli nie ma wcześniejszych faktur, rozpocznij od 1
            $newNumber = 1;
        }

        // Utwórz nowy numer faktury
        $invoiceNumber = sprintf('%d/%s/%s', $newNumber, $month, $year);

        // Przekaż numer do widoku
        $id = auth()->id();
        $user = User::where('id', $id)->first();
        $company = Company::where('id', $user->company_id)->first();
        return view('admin.invoice.create', compact('clients', 'invoiceNumber', 'company','services','products'));
    }
    public function store(Request $request)
    {

        // Zapis faktury do tabeli 'invoices'
        $invoice = new Invoice();

        // Oblicz termin płatności na podstawie pola payment_term (np. '14_dni')
        $paymentTerm = $request->input('payment_term');

        // Wyciągamy liczbę dni z terminu płatności (zakładając format 'X_dni')
        $days = intval(explode('_', $paymentTerm)[0]);

        // Obliczamy datę płatności na podstawie issue_date + $days
        $dueDate = Carbon::parse($invoice->issue_date)->addDays($days);

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

        // Inicjalizacja zmiennych do obliczeń
        $subtotal = 0;
        $vatAmount = 0;
        $total = 0;

        $invoice->subtotal = $subtotal;
        $invoice->vat = $vatAmount;
        $invoice->total = $total;
        $invoice->save();

        // Zapis pozycji faktury do tabeli 'invoice_items'
        foreach ($request->input('items') as $item) {
            $invoiceItem = new InvoiceItem();
            $invoiceItem->invoice_id = $invoice->id;
            $invoiceItem->name = $item['name'];
            $invoiceItem->quantity = $item['quantity'];
            $invoiceItem->unit_price = $item['price'];

            // Obliczanie wartości netto pozycji (quantity * unit_price)
            $itemSubtotal = $item['quantity'] * $item['price'];
            $invoiceItem->subtotal = $itemSubtotal;

            // Obliczanie VAT (jeśli nie jest 'zw' czyli zwolnione z VAT)
            if ($item['vat'] != 'zw') {
                $vatRate = floatval($item['vat']); // np. 23% VAT
                $itemVatAmount = $itemSubtotal * ($vatRate / 100);
            } else {
                $itemVatAmount = 0;
            }
            $invoiceItem->vat_rate = $item['vat'] != 'zw' ? $item['vat'] : 0;
            $invoiceItem->vat_amount = $itemVatAmount;

            // Wartość brutto pozycji (subtotal + VAT)
            $itemTotal = $itemSubtotal + $itemVatAmount;
            $invoiceItem->total = $itemTotal;

            // Dodawanie wartości pozycji do sumy faktury
            $subtotal += $itemSubtotal;
            $vatAmount += $itemVatAmount;
            $total += $itemTotal;

            // Zapis pozycji faktury
            $invoiceItem->save();
        }

        // Zapisanie obliczonych wartości do faktury
        $invoice->subtotal = $subtotal;
        $invoice->vat = $vatAmount;
        $invoice->total = $total;

        $invoice->save();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('invoice')->with('success', 'Faktura została pomyślnie utworzona.');
    }
    public function delete(Invoice $invoice)
    {
        // Usuń powiązane pozycje faktury
        $invoice->items()->delete();

        // Usuń fakturę
        $invoice->delete();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('invoice')->with('success', 'Faktura została pomyślnie usunięta.');
    }
    public function show(Invoice $invoice)
    {
        $invoice_obj = $invoice;
        return view('admin.invoice.show', compact('invoice', 'invoice_obj'));
    }
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
    public function edit(Invoice $invoice)
    {
        $clients = Client::all();
        // Przekaż numer do widoku
        $id = auth()->id();
        $user = User::where('id', $id)->first();
        $company = Company::where('id', $user->company_id)->first();
        $items = InvoiceItem::where('invoice_id', $invoice->id)->get();
        return view('admin.invoice.edit', compact('clients', 'invoice', 'company', 'items'));
    }
    public function update(Request $request, Invoice $invoice)
    {
        // Oblicz termin płatności na podstawie pola payment_term (np. '14_dni')
        $paymentTerm = $request->input('payment_term');

        // Wyciągamy liczbę dni z terminu płatności (zakładając format 'X_dni')
        $days = intval(explode('_', $paymentTerm)[0]);

        // Obliczamy datę płatności na podstawie issue_date + $days
        $dueDate = Carbon::parse($request->input('issue_date'))->addDays($days);

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

        // Inicjalizacja zmiennych do obliczeń
        $subtotal = 0;
        $vatAmount = 0;
        $total = 0;

        // Usunięcie istniejących pozycji faktury, aby zapisać nowe
        InvoiceItem::where('invoice_id', $invoice->id)->delete();

        // Zapis pozycji faktury do tabeli 'invoice_items'
        foreach ($request->input('items') as $item) {
            $invoiceItem = new InvoiceItem();
            $invoiceItem->invoice_id = $invoice->id;
            $invoiceItem->name = $item['name'];
            $invoiceItem->quantity = $item['quantity'];
            $invoiceItem->unit_price = $item['price'];

            // Obliczanie wartości netto pozycji (quantity * unit_price)
            $itemSubtotal = $item['quantity'] * $item['price'];
            $invoiceItem->subtotal = $itemSubtotal;

            // Obliczanie VAT (jeśli nie jest 'zw' czyli zwolnione z VAT)
            if ($item['vat'] != 'zw') {
                $vatRate = floatval($item['vat']); // np. 23% VAT
                $itemVatAmount = $itemSubtotal * ($vatRate / 100);
            } else {
                $itemVatAmount = 0;
            }
            $invoiceItem->vat_rate = $item['vat'] != 'zw' ? $item['vat'] : 0;
            $invoiceItem->vat_amount = $itemVatAmount;

            // Wartość brutto pozycji (subtotal + VAT)
            $itemTotal = $itemSubtotal + $itemVatAmount;
            $invoiceItem->total = $itemTotal;

            // Dodawanie wartości pozycji do sumy faktury
            $subtotal += $itemSubtotal;
            $vatAmount += $itemVatAmount;
            $total += $itemTotal;

            // Zapis pozycji faktury
            $invoiceItem->save();
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
