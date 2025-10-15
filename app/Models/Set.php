<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;
    // Określenie pól, które mogą być masowo wypełniane
    protected $fillable = [
        'name', // Nazwa zestawu
        'unit_price', // Cena jednostkowa netto
        'unit',
        'subtotal', // Wartość netto zestawu (ilość * cena jednostkowa)
        'vat_rate', // Stawka VAT w procentach
        'vat_amount', // Kwota VAT obliczona na podstawie wartości netto
        'total', // Wartość brutto zestawu (netto + VAT)
        'description', // Dodatkowy opis zestawu
        'company_id', // Id firmy powiązanej z klientem
        'user_id',
        'magazine',
    ];
    /**
     * Definiuje relację jeden-do-wielu (zestaw -> pozycje faktury).
     * Produkt może być częścią wielu pozycji na fakturach.
     */
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class); // Produkt może być użyty w wielu pozycjach faktur
    }

    public function offerItems()
    {
        return $this->hasMany(OfferItem::class);
    }
    /**
     * Definiuje relację odwrotną jeden-do-wielu (firma -> zestaw).
     * Każdy zestaw należy do jednej firmy.
     */
    public function company()
    {
        return $this->belongsTo(Company::class); // Produkt należy do jednej firmy
    }
    /**
     * Definiuje relację odwrotną jeden-do-wielu (użytkownik -> zestaw).
     * Każda Produkt należy do jednego użytkownika.
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]); // Produkt należy do jednego użytkownika
    }
}
