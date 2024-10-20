<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
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
        'subtotal', // Kwota netto
        'vat', // Kwota VAT
        'total', // Kwota brutto
        'seller_name', // Nazwa sprzedawcy
        'seller_address', // Adres sprzedawcy
        'seller_tax_id', // NIP sprzedawcy
        'buyer_name', // Nazwa nabywcy
        'buyer_address', // Adres nabywcy
        'buyer_tax_id', // NIP nabywcy
        'notes', // Dodatkowe uwagi do faktury
        'payment_method', // Metoda płatności
        'total_in_words', // Kwota w słowach
        'user_id', // ID użytkownika
        'path', // Ścieżka do pliku
    ];

    /**
     * Relacja z modelem `Company`.
     * Koszt należy do jednej firmy.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relacja z modelem `User`.
     * Koszt jest przypisany do jednego użytkownika.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
