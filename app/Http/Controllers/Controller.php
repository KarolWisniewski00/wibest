<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Cost;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Offer;
use App\Models\OfferItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use NumberToWords\NumberToWords;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Zwraca Id firmy zalogowanego użytkownika.
     */
    public function get_company_id()
    {
        return User::find(auth()->id())->company_id;
    }

    /**
     * Zwraca obiekt firmy zalogowanego użytkownika.
     */
    public function get_company()
    {
        return Company::where('id', $this->get_company_id())->first();
    }
    /**
     * Zwraca sugestie faktur, ostatnio aktualizowane
     */
    public function get_sugestion_invoices()
    {
        return Invoice::where('company_id', $this->get_company_id())
            ->orderBy('updated_at', 'desc')  // Sortowanie malejąco
            ->take(10)                       // Pobranie tylko pierwszych 10 rekordów
            ->get();
    }
    /**
     * Zwraca sugestie klientów, ostatnio aktualizowane
     */
    public function get_sugestion_clients()
    {
        return Client::where('company_id', $this->get_company_id())
            ->orderBy('updated_at', 'desc')  // Sortowanie malejąco
            ->take(10)                       // Pobranie tylko pierwszych 10 rekordów
            ->get();
    }
    /**
     * Zwraca wszystkie faktury
     */
    public function get_all_invoices()
    {
        return Invoice::where('company_id', $this->get_company_id())
            ->orderBy('created_at', 'desc')  // Sortowanie malejąco
            ->get();
    }
    /**
     * Zwraca wszystkich klientów
     */
    public function get_all_clients()
    {
        return Client::where('company_id', $this->get_company_id())
            ->orderBy('created_at', 'desc')  // Sortowanie malejąco
            ->get();
    }
    /**
     * Zwraca faktury domyślnie
     */
    public function get_invoices()
    {
        return Invoice::where('company_id', $this->get_company_id())
            ->orderBy('issue_date', 'desc')  // Sortowanie malejąco
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    /**
     * Zwraca klientów domyślnie
     */
    public function get_clients()
    {
        return Client::where('company_id', $this->get_company_id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    /**
     * Zwraca sugestie ofert, ostatnio aktualizowane
     */
    public function get_sugestion_offers()
    {
        return Offer::where('company_id', $this->get_company_id())
            ->orderBy('updated_at', 'desc')  // Sortowanie malejąco
            ->take(10)                       // Pobranie tylko pierwszych 10 rekordów
            ->get();
    }
    /**
     * Zwraca wszystkie ofert
     */
    public function get_all_offers()
    {
        return Offer::where('company_id', $this->get_company_id())
            ->orderBy('created_at', 'desc')  // Sortowanie malejąco
            ->get();
    }
    /**
     * Zwraca ofert domyślnie
     */
    public function get_offers()
    {
        return Offer::where('company_id', $this->get_company_id())
            ->orderBy('issue_date', 'desc')  // Sortowanie malejąco
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    /**
     * Zwraca sugestie faktur, ostatnio aktualizowane
     */
    public function get_sugestion_costs()
    {
        return Cost::where('company_id', $this->get_company_id())
            ->orderBy('updated_at', 'desc')  // Sortowanie malejąco
            ->take(10)                       // Pobranie tylko pierwszych 10 rekordów
            ->get();
    }
    /**
     * Zwraca wszystkie faktury
     */
    public function get_all_costs()
    {
        return Cost::where('company_id', $this->get_company_id())
            ->orderBy('created_at', 'desc')  // Sortowanie malejąco
            ->get();
    }
    /**
     * Zwraca faktury domyślnie
     */
    public function get_costs()
    {
        return Cost::where('company_id', $this->get_company_id())
            ->orderBy('due_date', 'desc')  // Sortowanie malejąco
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    /**
     * Zwraca faktury za pomocą miesiąca i roku
     */
    public function get_invoices_by($currentMonth, $currentYear)
    {
        return Invoice::where('company_id', $this->get_company_id())
            ->whereMonth('issue_date', $currentMonth)  // Tylko bieżący miesiąc
            ->whereYear('issue_date', $currentYear)    // Tylko bieżący rok
            ->orderBy('issue_date', 'desc')            // Sortowanie malejąco
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    /**
     * Zwraca oferty za pomocą miesiąca i roku
     */
    public function get_offers_by($currentMonth, $currentYear)
    {
        return Offer::where('company_id', $this->get_company_id())
            ->whereMonth('issue_date', $currentMonth)  // Tylko bieżący miesiąc
            ->whereYear('issue_date', $currentYear)    // Tylko bieżący rok
            ->orderBy('issue_date', 'desc')            // Sortowanie malejąco
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    /**
     * Zwraca faktury za pomocą miesiąca i roku
     */
    public function get_costs_by($currentMonth, $currentYear)
    {
        return Cost::where('company_id', $this->get_company_id())
            ->whereMonth('due_date', $currentMonth)  // Tylko bieżący miesiąc
            ->whereYear('due_date', $currentYear)    // Tylko bieżący rok
            ->orderBy('issue_date', 'desc')            // Sortowanie malejąco
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    /**
     * Zwraca faktury po nazwie
     */
    public function get_invoices_by_query($query)
    {
        return Invoice::where('company_id', $this->get_company_id())
            ->where(function ($q) use ($query) {
                $q->where('number', 'like', "%{$query}%")
                    ->orWhereHas('client', function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%");
                    });
            })
            ->orderBy('created_at', 'desc')
            ->take(10) // Pobranie maksymalnie 10 wyników
            ->get();
    }
    /**
     * Zwraca klientów po nazwie
     */
    public function get_clients_by_query($query)
    {
        return Client::where('company_id', $this->get_company_id())
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->take(10) // Pobranie maksymalnie 10 wyników
            ->get();
    }
    /**
     * Zwraca faktury po nazwie
     */
    public function get_costs_by_query($query)
    {
        return Cost::where('company_id', $this->get_company_id())
            ->where(function ($q) use ($query) {
                $q->where('number', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->take(10) // Pobranie maksymalnie 10 wyników
            ->get();
    }
    /**
     * Zwraca zawartość faktury za pomocą id faktury
     */
    public function get_invoice_items_by_invoice_id($id)
    {
        return InvoiceItem::where('invoice_id', $id)->get();
    }
    /**
     * Zwraca zawartość faktury za pomocą id faktury
     */
    public function get_offer_items_by_offer_id($id)
    {
        return OfferItem::where('offer_id', $id)->get();
    }
    /**
     * Obsługuje przesyłanie i walidację pliku.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return string|null
     */
    public function handle_attachment_upload($file)
    {
        try {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('attachments'), $fileName);
            return $fileName;
        } catch (\Exception $e) {
            // Obsługa błędów przesyłania plików
            return null;
        }
    }
    /**
     * Zwraca obiekt firmy zalogowanego użytkownika.
     */
    public function get_invoice_number()
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
     * Zwraca numer oferty w formacie {numer}/{rok}.
     */
    public function get_offer_number()
    {
        // Pobierz aktualny rok
        $year = Carbon::now()->format('Y');

        // Znajdź ostatnią ofertę, aby określić autoinkrementację
        $lastOffer = Offer::where('company_id', $this->get_company_id())
            ->orderBy('id', 'desc')
            ->first();

        if ($lastOffer) {
            // Pobierz numer z poprzedniej oferty i zwiększ go o 1
            $lastNumber = explode('/', $lastOffer->number)[0];
            $newNumber = intval($lastNumber) + 1;
        } else {
            // Jeśli nie ma wcześniejszych ofert, rozpocznij od 1
            $newNumber = 1;
        }

        // Utwórz nowy numer oferty w formacie {numer}/{rok}
        return sprintf('%d/%s', $newNumber, $year);
    }
    /**
     * Zwraca kwotę słownie.
     */
    public function get_total_in_words($total)
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
    public function get_zlote_form($zlote)
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
    public function get_grosze_form($grosze)
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
     * Zamienia termin płatności typu string na datę
     */
    public function payment_term_to_due_date($paymentTerm, $issue_date)
    {
        // Wyciągamy liczbę dni z terminu płatności (zakładając format 'X_dni')
        $days = intval(explode('_', $paymentTerm)[0]);

        // Obliczamy datę płatności na podstawie issue_date + $days
        return Carbon::parse($issue_date)->addDays($days);
    }

    /**
     * Zamienia datę płatności na termin płatności typu string
     */
    public function due_date_to_payment_term($issue_date, $due_date)
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
    public function item_create($item, $id)
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
        $invoiceItem->unit = null;
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
    public function item_create_offer($item, $id)
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

        $offerItem = new OfferItem();
        $offerItem->offer_id = $id;
        $offerItem->product_id = $item['product_id'];
        $offerItem->service_id = $item['service_id'];
        $offerItem->name = $item['name'];
        $offerItem->quantity = $item['quantity'];
        $offerItem->unit_price = $item['price'];
        $offerItem->unit = null;
        $offerItem->subtotal = $itemSubtotal;
        $offerItem->vat_rate = $item['vat'] != 'zw' ? $item['vat'] : 0;
        $offerItem->vat_amount = $itemVatAmount;

        // Wartość brutto pozycji (subtotal + VAT)
        $itemTotal = $itemSubtotal + $itemVatAmount;
        $offerItem->total = $itemTotal;

        // Zapis pozycji faktury
        $offerItem->save();

        return [
            'itemSubtotal' => $itemSubtotal,
            'itemVatAmount' => $itemVatAmount,
            'itemTotal' => $itemTotal,
        ];
    }

    public function get_offer_data_from_obj(Offer $offer, $items)
    {
        return [
            'number' => $offer->number,
            'issue_date' => $offer->issue_date,
            'due_date' => $offer->due_date,
            'status' => $offer->status,
            'client' => [
                'name' => $offer->buyer_name,
                'address' => $offer->buyer_adress,
                'tax_id' => $offer->buyer_tax_id,
                'buyer_person_name' => $offer->buyer_person_name,
                'buyer_person_email' => $offer->buyer_person_email
            ],
            'items' => $items,
            'seller' => [
                'name' => $offer->seller_name,
                'address' => $offer->seller_adress,
                'tax_id' => $offer->seller_tax_id,
                'bank' => $offer->seller_bank
            ],
            'subtotal' => $offer->subtotal,
            'vat' => $offer->vat,
            'total' => $offer->total,
            'notes' => $offer->notes,
            'total_in_words' => $offer->total_in_words
        ];
    }
    public function get_invoice_data_from_obj(Invoice $invoice, $items)
    {
        return [
            'number' => $invoice->number,
            'invoice_type' => $invoice->invoice_type,
            'issue_date' => $invoice->issue_date,
            'due_date' => $invoice->due_date,
            'status' => $invoice->status,
            'client' => [
                'name' => $invoice->buyer_name,
                'address' => $invoice->buyer_adress,
                'tax_id' => $invoice->buyer_tax_id
            ],
            'items' => $items,
            'seller' => [
                'name' => $invoice->seller_name,
                'address' => $invoice->seller_adress,
                'tax_id' => $invoice->seller_tax_id,
                'bank' => $invoice->seller_bank
            ],
            'subtotal' => $invoice->subtotal,
            'vat' => $invoice->vat,
            'total' => $invoice->total,
            'notes' => $invoice->notes,
            'payment_method' => $invoice->payment_method,
            'total_in_words' => $invoice->total_in_words
        ];
    }
}
