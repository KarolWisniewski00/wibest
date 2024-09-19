<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Określenie pól, które mogą być masowo wypełniane
    protected $fillable = [
        'name', // Nazwa usługi
        'unit_price', // Cena jednostkowa netto
        'subtotal', // Wartość netto usługi (ilość * cena jednostkowa)
        'vat_rate', // Stawka VAT w procentach
        'vat_amount', // Kwota VAT obliczona na podstawie wartości netto
        'total', // Wartość brutto usługi (netto + VAT)
        'description', // Dodatkowy opis usługi
    ];

    /**
     * Definiuje relację jeden-do-wielu (usługa -> pozycje faktury).
     * Usługa może być używana w wielu pozycjach na fakturach.
     */
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class); // Usługa może być częścią wielu pozycji na fakturach
    }
}
