<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    // Określenie pól, które mogą być masowo wypełniane
    protected $fillable = [
        'invoice_id', // ID faktury, do której należy pozycja
        'product_id', // ID produktu (może być null)
        'service_id', // ID usługi (może być null)
        'name', // Nazwa produktu lub usługi
        'quantity', // Ilość produktu/usługi
        'unit_price', // Cena jednostkowa netto
        'subtotal', // Wartość netto (ilość * cena jednostkowa)
        'vat_rate', // Stawka VAT
        'vat_amount', // Kwota VAT
        'total', // Wartość brutto (netto + VAT)
    ];

    /**
     * Definiuje relację z modelem `Invoice`.
     * Każda pozycja należy do jednej faktury.
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class); // Pozycja należy do jednej faktury
    }

    /**
     * Definiuje relację z modelem `Product`.
     * Każda pozycja może być związana z jednym produktem.
     */
    public function product()
    {
        return $this->belongsTo(Product::class); // Pozycja może być produktem
    }

    /**
     * Definiuje relację z modelem `Service`.
     * Każda pozycja może być związana z jedną usługą.
     */
    public function service()
    {
        return $this->belongsTo(Service::class); // Pozycja może być usługą
    }
}
