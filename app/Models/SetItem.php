<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetItem extends Model
{
    use HasFactory;
    // Określenie pól, które mogą być masowo wypełniane
    protected $fillable = [
        'product_id', // ID produktu (może być null)
        'service_id', // ID usługi (może być null)
        'set_id', // ID usługi (może być null)
        'name', // Nazwa produktu lub usługi
        'quantity', // Ilość produktu/usługi
        'unit', // Ilość produktu/usługi
        'unit_price', // Cena jednostkowa netto
        'subtotal', // Wartość netto (ilość * cena jednostkowa)
        'vat_rate', // Stawka VAT
        'vat_amount', // Kwota VAT
        'total', // Wartość brutto (netto + VAT)
    ];

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
        /**
     * Definiuje relację z modelem `Set`.
     * Każda pozycja może być związana z jednym zestawem.
     */
    public function set()
    {
        return $this->belongsTo(Set::class); // Pozycja może być zestawem
    }
}
