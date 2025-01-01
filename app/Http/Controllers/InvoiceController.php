<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Mail\InvoiceMail;
use App\Models\Client;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Offer;
use App\Models\OfferItem;
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
use SoapClient;
use GuzzleHttp\Client as GHC;

class InvoiceController extends Controller
{
    /**
     * Pokazuje faktury od najnowszych.
     */
    public function index()
    {
        $invoices = $this->get_invoices();
        $invoices_sugestion = $this->get_sugestion_invoices();
        $invoices_all =  $this->get_all_invoices();

        return view('admin.invoice.index', compact('invoices', 'invoices_sugestion', 'invoices_all'));
    }
    /**
     * Pokazuje faktury z aktualnego miesiąca od najnowszych.
     */
    public function index_now()
    {
        $currentMonth = now()->month; // Pobiera bieżący miesiąc
        $currentYear = now()->year;   // Pobiera bieżący rok

        $invoices = $this->get_invoices_by($currentMonth, $currentYear);
        $invoices_sugestion = $this->get_sugestion_invoices();
        $invoices_all =  $this->get_all_invoices();

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

        $invoices = $this->get_invoices_by($previousMonth, $previousMonthYear);
        $invoices_sugestion = $this->get_sugestion_invoices();
        $invoices_all =  $this->get_all_invoices();

        return view('admin.invoice.index', compact('invoices', 'invoices_sugestion', 'invoices_all'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Wyszukiwanie faktur na podstawie numeru lub klienta
        $invoices = $this->get_invoices_by_query($query);

        // Zwracamy faktury jako JSON
        return response()->json($invoices);
    }


    /**
     * Pokazuje fakturę.
     */
    public function show(Invoice $invoice)
    {
        $invoice_obj = $invoice;
        $invoiceItems = $this->get_invoice_items_by_invoice_id($invoice_obj->id);
        return view('admin.invoice.show', compact('invoice', 'invoice_obj', 'invoiceItems'));
    }
    /**
     * Pokazuje formularz tworzenia nowej faktury.
     */
    //public function create()
    //{
    //    $clients = Client::where('company_id', $this->get_company_id())->get();
    //    $services = Service::where('company_id', $this->get_company_id())->get();
    //    $products = Product::where('company_id', $this->get_company_id())->get();
    //    $invoiceNumber = $this->get_invoice_number();
    //    $company = $this->get_company();
    //    return view('admin.invoice.create', compact('clients', 'invoiceNumber', 'company', 'services', 'products'));
    //}
    public function create()
    {
        $clients = Client::where('company_id', $this->get_company_id())->get();
        $value = $this->get_number();
        $company = $this->get_company();
        $user = User::where('id', auth()->id())->first();
        $form = $user->setting_format;
        $set_client = $user->setting_client;
        return view('admin.invoice.createn', compact('company', 'value', 'form', 'clients','set_client'));
    }
    public function gus($nip)
    {
        // URL usługi SOAP
        $wsdl = 'https://wyszukiwarkaregon.stat.gov.pl/wsBIR/UslugaBIRzewnPubl.svc';
        $action = 'http://CIS/BIR/PUBL/2014/07/IUslugaBIRzewnPubl/Zaloguj';


        $soapRequest =
            '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope"
                    xmlns:ns="http://CIS/BIR/PUBL/2014/07">
                        <soap:Header xmlns:wsa="http://www.w3.org/2005/08/addressing">
                            <wsa:To>https://wyszukiwarkaregon.stat.gov.pl/wsBIR/UslugaBIRzewnPubl.svc</wsa:To>
                            <wsa:Action>' . $action . '</wsa:Action>
                        </soap:Header>
                        <soap:Body>
                            <ns:Zaloguj>
                                <ns:pKluczUzytkownika>e6b53a07ba8b47318a0a</ns:pKluczUzytkownika>
                            </ns:Zaloguj>
                        </soap:Body>
                    </soap:Envelope>
                    ';
        try {
            // Użycie GuzzleHTTP do obsługi MTOM
            $client = new GHC();

            $response = $client->request('POST', $wsdl, [
                'headers' => [
                    'Content-Type' => 'application/soap+xml; charset=utf-8; action="' . $action . '"',
                    'Accept-Encoding' => 'gzip,deflate',
                    'Connection' => 'Keep-Alive',
                    'SOAPAction' => $action,
                ],
                'body' => $soapRequest,
            ]);
            // Odpowiedź, którą otrzymujesz
            $responseBody = $response->getBody()->getContents();

            // Wzorzec do wyodrębnienia wartości z <ZalogujResult>...</ZalogujResult>
            preg_match('/<ZalogujResult>(.*?)<\/ZalogujResult>/', $responseBody, $matches);

            // Jeśli dopasowanie zostało znalezione, wartość ZalogujResult
            if (isset($matches[1])) {
                $sid = $matches[1];
            } else {
                $sid = null; // Jeżeli nie znaleziono wyniku
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
        try {
            $soapRequest =
                '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope"
                xmlns:ns="http://CIS/BIR/PUBL/2014/07" xmlns:dat="http://CIS/BIR/PUBL/2014/07/DataContract">
                    <soap:Header xmlns:wsa="http://www.w3.org/2005/08/addressing">
                        <wsa:To>https://wyszukiwarkaregon.stat.gov.pl/wsBIR/UslugaBIRzewnPubl.svc</wsa:To>
                        <wsa:Action>http://CIS/BIR/PUBL/2014/07/IUslugaBIRzewnPubl/DaneSzukajPodmioty</wsa:Action>
                    </soap:Header>
                    <soap:Body>
                        <ns:DaneSzukajPodmioty>
                        <ns:pParametryWyszukiwania>
                            <dat:Nip>' . $nip . '</dat:Nip>
                        </ns:pParametryWyszukiwania>
                        </ns:DaneSzukajPodmioty>
                    </soap:Body>
                </soap:Envelope>
            ';
            $response = $client->request('POST', $wsdl, [
                'headers' => [
                    'Content-Type' => 'application/soap+xml; charset=utf-8;',
                    'SOAPAction' => 'http://CIS/BIR/PUBL/2014/07/IUslugaBIRzewnPubl/DaneSzukajPodmioty',
                    'sid' => $sid,
                ],
                'body' => $soapRequest,
            ]);

            // Odpowiedź, którą otrzymujesz
            $responseBody = $response->getBody()->getContents();

            // Wzorzec do wyodrębnienia wartości z <ZalogujResult>...</ZalogujResult>
            preg_match('/&lt;Nazwa&gt;(.*?)&lt;\/Nazwa&gt;&#xD;/', $responseBody, $matches);

            // Jeśli dopasowanie zostało znalezione, wartość ZalogujResult
            if (isset($matches[1])) {
                $name = $matches[1];
            } else {
                $name = null; // Jeżeli nie znaleziono wyniku
            }
            // Wzorzec do wyodrębnienia wartości z <ZalogujResult>...</ZalogujResult>
            preg_match('/&lt;Miejscowosc&gt;(.*?)&lt;\/Miejscowosc&gt;&#xD;/', $responseBody, $matches);

            // Jeśli dopasowanie zostało znalezione, wartość ZalogujResult
            if (isset($matches[1])) {
                $city = $matches[1];
            } else {
                $city = null; // Jeżeli nie znaleziono wyniku
            }

            // Wzorzec do wyodrębnienia wartości z <ZalogujResult>...</ZalogujResult>
            preg_match('/&lt;Ulica&gt;(.*?)&lt;\/Ulica&gt;&#xD;/', $responseBody, $matches);

            // Jeśli dopasowanie zostało znalezione, wartość ZalogujResult
            if (isset($matches[1])) {
                $street = $matches[1];
            } else {
                $street = null; // Jeżeli nie znaleziono wyniku
            }

            // Wzorzec do wyodrębnienia wartości z <ZalogujResult>...</ZalogujResult>
            preg_match('/&lt;NrNieruchomosci&gt;(.*?)&lt;\/NrNieruchomosci&gt;&#xD;/', $responseBody, $matches);

            // Jeśli dopasowanie zostało znalezione, wartość ZalogujResult
            if (isset($matches[1])) {
                $number = $matches[1];
            } else {
                $number = null; // Jeżeli nie znaleziono wyniku
            }

            // Wzorzec do wyodrębnienia wartości z <ZalogujResult>...</ZalogujResult>
            preg_match('/&lt;NrNieruchomosci&gt;(.*?)&lt;\/NrNieruchomosci&gt;&#xD;/', $responseBody, $matches);

            // Jeśli dopasowanie zostało znalezione, wartość ZalogujResult
            if (isset($matches[1])) {
                $number = $matches[1];
            } else {
                $number = null; // Jeżeli nie znaleziono wyniku
            }

            return response()->json([
                'status' => 'success',
                'response' => [
                    'name' => $name,
                    'adres' => $city . ', ' . $street . ' ' . $number,
                    'nip' => $nip,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function value($month, $year, $type)
    {
        return $this->get_invoice_number_by_month_year($month, $year, $type);
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
     * Pokazuje formularz tworzenia nowej faktury proformy.
     */
    public function create_pro_client(Client $client)
    {
        $create_client = $client;
        $clients = Client::where('company_id', $this->get_company_id())->get();
        $services = Service::where('company_id', $this->get_company_id())->get();
        $products = Product::where('company_id', $this->get_company_id())->get();
        $invoiceNumber = $this->get_invoice_number();
        $company = $this->get_company();
        $pro = true;
        return view('admin.invoice.create', compact('pro', 'create_client', 'clients', 'invoiceNumber', 'company', 'services', 'products'));
    }
    /**
     * Zapisuje formularz tworzenia nowej faktury.
     */
    public function store(InvoiceRequest $request)
    {
        // Zapis faktury do tabeli 'invoices'
        $invoice = new Invoice();

        // Inicjalizacja zmiennych do obliczeń
        $subtotal = 0;
        $vatAmount = 0;
        $total = 0;

        // Zapisuje pusty numer konta
        if ($request->input('bank') == null) {
            $bank = '';
        } else {
            $bank = $request->input('bank');
        }
        if ($request->input('invoice_type') == 'faktura proforma') {
            $type = 'PRO';
        } else {
            $type = 'FVS';
        }
        if ($request->input('number') == null) {
            // Konwersja daty za pomocą Carbon
            $date = Carbon::createFromFormat('d/m/Y', $request->input('issue_date'));

            // Wydobycie miesiąca i roku
            $month = $date->format('m'); // 12
            $year = $date->format('Y');  // 2024
            $numc = $this->get_invoice_number_by_month_year($month, $year, $request->input('invoice_type'));
            switch ($request->input('setting_format')) {
                case 'prosty':
                    $number = $type . '/' . $numc;
                    break;
                case 'podstawowy':
                    $number = $type . '/' . $numc.'/'.$year;
                    break;
                case 'data':
                    $number = $type . '/' . $numc.'/'.$month.'/'.$year;
                    break;
                case 'wlasny':
                    $number = $type . '/' .$request->input('number');
                    break;
                default:
                    $number = '';
                    break;
            }
        } else {
            $number = $type . '/' .$request->input('number');
        }
        if($request->input('paid') == 'opłacono'){
            $status = 'opłacona';
        }else{
            $status = 'wystawiona';
        }
        $user = User::where('id', auth()->id())->first();
        // Ustawiamy obliczoną datę jako termin płatności
        $invoice->number = $number;
        $user->setting_format = $request->input('setting_format'); //new setting
        $invoice->issue_date = Carbon::createFromFormat('d/m/Y', $request->input('issue_date'))->format('Y-m-d');
        $invoice->sale_date = Carbon::createFromFormat('d/m/Y', $request->input('sale_date'))->format('Y-m-d'); //new
        $invoice->invoice_type = $request->input('invoice_type');
        $invoice->due_date = Carbon::createFromFormat('d/m/Y', $request->input('payment_date'))->format('Y-m-d');
        $invoice->payment_term = $request->input('payment_term'); //new
        $invoice->company_id = $request->input('company_id');
        $invoice->seller_name = $request->input('seller_name');
        $invoice->seller_adress = $request->input('seller_adress');
        $invoice->seller_tax_id = $request->input('seller_vat_number');
        $invoice->seller_bank = $bank;
        $invoice->buyer_name = $request->input('buyer_name');
        $invoice->client_id = $request->input('client_id');
        $invoice->buyer_adress = $request->input('buyer_adress');
        $invoice->buyer_tax_id = $request->input('buyer_vat_number');
        $user->setting_client = $request->input('setting_client'); //new setting
        $invoice->paid = $request->input('paid'); //new
        $invoice->paid_part = $request->input('paid_part'); //new
        $invoice->payment_method = $request->input('payment_method');
        $invoice->notes = $request->input('notes');
        $invoice->subtotal = $subtotal;
        $invoice->vat = $vatAmount;
        $invoice->total = $total;
        $invoice->user_id = $user->id;
        $invoice->status = $status;
        $invoice->save();
        $user->save();

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
        $invoice_new_record->number = $this->get_invoice_number();
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
     * Zapisuje nową fakturę sprzedażową.
     */
    public function store_from_ofr(Offer $offer)
    {
        // Zapis faktury sprzedażowej na podstawie proformy
        $invoice_new_record = new Invoice();
        // Obliczanie terminu płatności
        $dueDate = $this->payment_term_to_due_date('payment_14days', now());
        $user = User::where('id', auth()->id())->first();
        $invoice_new_record->due_date = $dueDate;
        $invoice_new_record->number = $this->get_invoice_number();
        $invoice_new_record->issue_date = now();
        $invoice_new_record->company_id = $offer->company_id;
        $invoice_new_record->client_id = $offer->client_id;
        $invoice_new_record->seller_name = $offer->seller_name;
        $invoice_new_record->seller_adress = $offer->seller_adress;
        $invoice_new_record->seller_tax_id = $offer->seller_tax_id;
        $invoice_new_record->seller_bank = $offer->seller_bank;
        $invoice_new_record->buyer_name = $offer->buyer_name;
        $invoice_new_record->buyer_adress = $offer->buyer_adress;
        $invoice_new_record->buyer_tax_id = $offer->buyer_tax_id;
        $invoice_new_record->payment_method = 'payment_transfer';
        $invoice_new_record->notes = $offer->notes;
        $invoice_new_record->subtotal = $offer->subtotal;
        $invoice_new_record->vat = $offer->vat;
        $invoice_new_record->total = $offer->total;
        $invoice_new_record->user_id = $user->id;
        $invoice_new_record->total_in_words = $offer->total_in_words;

        // Zapisanie nowego rekordu faktury sprzedażowej
        $invoice_new_record->save();

        // Przypisanie ID nowej faktury do starej (proforma)
        //$invoice->invoice_id = $invoice_new_record->id;
        //$invoice->save();

        // Przypisanie ID proformy do nowo utworzonej faktury sprzedażowej
        //$invoice_new_record->invoice_id = $invoice->id;
        //$invoice_new_record->save();

        // Zapis pozycji faktury do tabeli 'offer_items'
        $offer_items = OfferItem::where('offer_id', $offer->id)->get();
        foreach ($offer_items as $item) {
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
        return redirect()->back()->with('error', 'tymczasowo niedostępne.');
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
        $invoice = $this->get_invoice_data_from_obj($invoice_obj, $items);
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
        $invoice = $this->get_invoice_data_from_obj($invoice_obj, $items);

        // Generowanie PDF
        $invoiceNumber = str_replace([' ', '/'], '-', $invoice_obj->number);
        $pdf = PDF::loadView('admin.template.invoice', compact('invoice'));

        // Pobranie pliku PDF
        return $pdf->download('faktura-' . $invoice_obj->seller_name . '-' . $invoiceNumber . '.pdf');
    }
    public function send_invoice(Invoice $invoice)
    {
        // Weryfikacja, czy klient ma adres e-mail
        if ($invoice->client->email == null && $invoice->client->email2 == null) {
            return redirect()->back()->with('fail', 'Klient nie ma adresu e-mail do wysłania faktury.');
        }

        $items = InvoiceItem::where('invoice_id', $invoice->id)->get();
        $invoice_obj = Invoice::where('id', $invoice->id)->first();
        $invoice = $this->get_invoice_data_from_obj($invoice_obj, $items);

        // Generowanie PDF
        $pdf = PDF::loadView('admin.template.invoice', compact('invoice'));

        // Wysłanie e-maila z załącznikiem
        try {
            Mail::to($invoice_obj->client->email2)->send(new InvoiceMail($invoice_obj, $pdf));
        } catch (Exception) {
        }
        try {
            Mail::to($invoice_obj->client->email)->send(new InvoiceMail($invoice_obj, $pdf));
        } catch (Exception) {
        }

        return redirect()->back()->with('success', 'Faktura została wysłana pomyślnie!');
    }
}
