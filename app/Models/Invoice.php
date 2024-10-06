<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // Pola, które mogą być masowo wypełniane
    protected $fillable = [
        'number', // Unikalny numer faktury
        'invoice_type', // Typ faktury (np. faktura lub faktura proforma)
        'company_id', // ID firmy wystawiającej fakturę
        'issue_date', // Data wystawienia faktury
        'due_date', // Termin płatności faktury
        'status', // Status faktury (np. draft, sent, paid, canceled)
        'client_id', // ID klienta
        'subtotal', // Kwota netto
        'vat', // Kwota VAT
        'total', // Kwota brutto
        'seller_name', // Nazwa sprzedawcy
        'seller_address', // Adres sprzedawcy
        'seller_tax_id', // NIP sprzedawcy
        'seller_bank',
        'buyer_name', // Nazwa nabywcy
        'buyer_address', // Adres nabywcy
        'buyer_tax_id', // NIP nabywcy
        'notes', // Dodatkowe uwagi do faktury
        'payment_method', // Metoda płatności
        'total_in_words',
        'user_id',
    ];

    /**
     * Relacja z modelem `Company`.
     * Faktura należy do jednej firmy.
     */
    public function company()
    {
        return $this->belongsTo(Company::class); // Faktura należy do firmy
    }

    /**
     * Relacja z modelem `Client`.
     * Faktura może być przypisana do jednego klienta.
     */
    public function client()
    {
        return $this->belongsTo(Client::class); // Faktura jest przypisana do klienta
    }

    /**
     * Relacja z modelem `InvoiceItem` (pozycje na fakturze).
     * Faktura może mieć wiele pozycji (produkty lub usługi).
     */
    public function items()
    {
        return $this->hasMany(InvoiceItem::class); // Faktura może mieć wiele pozycji
    }
    /**
     * Definiuje relację odwrotną jeden-do-wielu (użytkownik -> faktura).
     * Każda faktura należy do jednego użytkownika.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Faktura należy do jednego użytkownika
    }
}
