<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Offer;
use App\Models\OfferItem;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class OfferController extends Controller
{
    /**
     * Pokazuje oferty od najnowszych.
     */
    public function index()
    {
        $offers = $this->get_offers();
        $offers_sugestion = $this->get_sugestion_offers();
        $offers_all =  $this->get_all_offers();

        return view('admin.offer.index', compact('offers', 'offers_sugestion', 'offers_all'));
    }
    /**
     * Pokazuje oferty z aktualnego miesiąca od najnowszych.
     */
    public function index_now()
    {
        $currentMonth = now()->month; // Pobiera bieżący miesiąc
        $currentYear = now()->year;   // Pobiera bieżący rok

        $offers = $this->get_offers_by($currentMonth, $currentYear);
        $offers_sugestion = $this->get_sugestion_offers();
        $offers_all =  $this->get_all_offers();

        return view('admin.offer.index', compact('offers', 'offers_sugestion', 'offers_all'));
    }
    /**
     * Pokazuje oferty z poprzedniego miesiąca od najnowszych.
     */
    public function index_last()
    {
        // Pobierz datę dla poprzedniego miesiąca
        $previousMonth = now()->subMonth()->month;  // Poprzedni miesiąc
        $previousMonthYear = now()->subMonth()->year;  // Rok poprzedniego miesiąca

        $offers = $this->get_offers_by($previousMonth, $previousMonthYear);
        $offers_sugestion = $this->get_sugestion_offers();
        $offers_all =  $this->get_all_offers();

        return view('admin.offer.index', compact('offers', 'offers_sugestion', 'offers_all'));
    }
    /**
     * Pokazuje formularz tworzenia nowej oferty.
     */
    public function create()
    {
        $clients = Client::where('company_id', $this->get_company_id())->get();
        $services = Service::where('company_id', $this->get_company_id())->get();
        $products = Product::where('company_id', $this->get_company_id())->get();
        $offerNumber = $this->get_offer_number();
        $company = $this->get_company();
        return view('admin.offer.create', compact('clients', 'offerNumber', 'company', 'services', 'products'));
    }
    /**
     * Pokazuje formularz tworzenia nowej oferty.
     */
    public function create_client(Client $client)
    {
        $create_client = $client;
        $clients = Client::where('company_id', $this->get_company_id())->get();
        $services = Service::where('company_id', $this->get_company_id())->get();
        $products = Product::where('company_id', $this->get_company_id())->get();
        $offerNumber = $this->get_offer_number();
        $company = $this->get_company();
        return view('admin.offer.create', compact('create_client', 'clients', 'offerNumber', 'company', 'services', 'products'));
    }
    /**
     * Zapisuje formularz tworzenia nowej oferty.
     */
    public function store(Request $request)
    {
        // Zapis faktury do tabeli 'offers'
        $offer = new Offer();

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
        $offer->due_date = $dueDate;
        $offer->number = $request->input('number');
        $offer->issue_date = $request->input('issue_date');
        $offer->company_id = $request->input('company_id');
        $offer->client_id = $request->input('client_id');
        $offer->seller_name = $request->input('seller_name');
        $offer->seller_adress = $request->input('seller_adress');
        $offer->seller_tax_id = $request->input('seller_vat_number');
        $offer->seller_bank = $bank;
        $offer->buyer_name = $request->input('buyer_name');
        $offer->buyer_adress = $request->input('buyer_adress');
        $offer->buyer_tax_id = $request->input('buyer_vat_number');
        $offer->buyer_person_name = $request->input('buyer_person_name');
        $offer->buyer_person_email = $request->input('buyer_person_email');
        $offer->notes = $request->input('notes');
        $offer->subtotal = $subtotal;
        $offer->vat = $vatAmount;
        $offer->total = $total;
        $offer->user_id = $user->id;
        $offer->save();

        // Zapis pozycji faktury do tabeli 'offer_items'
        foreach ($request->input('items') as $item) {
            $totals = $this->item_create_offer($item, $offer->id);

            // Dodawanie wartości pozycji do sumy faktury
            $subtotal += $totals['itemSubtotal'];
            $vatAmount += $totals['itemVatAmount'];
            $total += $totals['itemTotal'];
        }

        // Zapisanie obliczonych wartości do faktury
        $offer->subtotal = $subtotal;
        $offer->vat = $vatAmount;
        $offer->total = $total;

        // Zamiana kwoty na słownie i zapis do faktury
        $offer->total_in_words = $this->get_total_in_words($total);

        // Pobierz informacje o zalogowanym użytkowniku
        $user = User::where('id', auth()->id())->first();

        // Jeśli nie ma klienta połączonego spróbuj utworzyć
        if ($request->input('client_id') == null) {
            try {
                // Jeśli nie da się utworzyć to połącz
                $client = Client::where('vat_number', $request->input('buyer_vat_number'))->where('company_id', $user->company_id)->first();
                $offer->client_id = $client->id;
            } catch (Exception) {
            }
        }

        // Zapisanie faktury
        $offer->save();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('offer')->with('success', 'Oferta została pomyślnie utworzona.');
    }
    /**
     * Pokazuje ofertę.
     */
    public function show(Offer $offer)
    {
        $offer_obj = $offer;
        $offerItems = $this->get_offer_items_by_offer_id($offer_obj->id);
        return view('admin.offer.show', compact('offer', 'offer_obj', 'offerItems'));
    }

    /**
     * Pokazuje fakturę z pozycjami to co później trafia do pdf.
     */
    public function file(Offer $offer)
    {
        $offer_obj = $offer;
        $items = OfferItem::where('offer_id', $offer_obj->id)->get();

        $offer = $this->get_offer_data_from_obj($offer_obj, $items);
        $user = User::where('id', $offer_obj->user_id)->first();
        return view('admin.template.offer', compact('offer', 'user'));
    }
    /**
     * Pobiera fakturę z pozycjami w pdf.
     */
    public function download($offer)
    {
        $offer_str = $offer;
        $items = OfferItem::where('offer_id', $offer_str)->get();
        $offer_obj = Offer::where('id', $offer_str)->first();
        $offer = $this->get_offer_data_from_obj($offer_obj, $items);

        // Generowanie PDF
        $offerNumber = str_replace([' ', '/'], '-', $offer_obj->number);
        $user = User::where('id', $offer_obj->user_id)->first();
        $pdf = PDF::loadView('admin.template.offer', compact('offer', 'user'));

        // Pobranie pliku PDF
        return $pdf->download('oferta-' . $offer_obj->seller_name . '-' . $offerNumber . '.pdf');
    }
    /**
     * Pokazuje formularz edycji faktury.
     */
    public function edit(Offer $offer)
    {
        $services = Service::where('company_id', $this->get_company_id())->get();
        $products = Product::where('company_id', $this->get_company_id())->get();


        $clients = Client::where('company_id', $this->get_company_id())->get();
        $company = $this->get_company();
        $items = OfferItem::where('offer_id', $offer->id)->get();
        $payment_term = $this->due_date_to_payment_term($offer->issue_date, $offer->due_date);
        return view('admin.offer.edit', compact('payment_term', 'clients', 'offer', 'company', 'items', 'services', 'products'));
    }

    /**
     * Usuwa ofertę z pozycjami.
     */
    public function delete(Offer $offer)
    {
        // Usuń powiązane pozycje faktury
        $offer->items()->delete();

        // Usuń fakturę
        $offer->delete();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('offer')->with('success', 'Oferta została pomyślnie usunięta.');
    }
}
