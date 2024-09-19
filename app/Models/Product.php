<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Określenie pól, które mogą być masowo wypełniane
    protected $fillable = [
        'name', // Nazwa produktu
        'unit_price', // Cena jednostkowa netto
        'subtotal', // Wartość netto produktu (ilość * cena jednostkowa)
        'vat_rate', // Stawka VAT w procentach
        'vat_amount', // Kwota VAT obliczona na podstawie wartości netto
        'total', // Wartość brutto produktu (netto + VAT)
        'description', // Dodatkowy opis produktu
    ];

    /**
     * Definiuje relację jeden-do-wielu (produkt -> pozycje faktury).
     * Produkt może być częścią wielu pozycji na fakturach.
     */
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class); // Produkt może być użyty w wielu pozycjach faktur
    }
}
