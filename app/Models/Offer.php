<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    // Pola, które mogą być masowo wypełniane
    protected $fillable = [
        'number', // Unikalny numer oferty
        'company_id', // ID firmy wystawiającej fakturę
        'issue_date', // Data wystawienia oferty
        'due_date',
        'status',
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
        'buyer_person_name',
        'buyer_person_email',
        'notes', // Dodatkowe uwagi do oferty
        'total_in_words',
        'user_id',
        'project_id',
        'project_scope',
        'due_term',
        'status'
    ];
    /**
     * Relacja z modelem `Company`.
     * Oferta należy do jednej firmy.
     */
    public function company()
    {
        return $this->belongsTo(Company::class); // Oferta należy do firmy
    }

    /**
     * Relacja z modelem `Client`.
     * Oferta może być przypisana do jednego klienta.
     */
    public function client()
    {
        return $this->belongsTo(Client::class); // Oferta jest przypisana do klienta
    }

    /**
     * Relacja z modelem `InvoiceItem` (pozycje na fakturze).
     * Oferta może mieć wiele pozycji (produkty lub usługi).
     */
    public function items()
    {
        return $this->hasMany(OfferItem::class); // Oferta może mieć wiele pozycji
    }
    /**
     * Definiuje relację odwrotną jeden-do-wielu (użytkownik -> oferta).
     * Każda oferta należy do jednego użytkownika.
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]); // Oferta należy do jednego użytkownika
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
}
