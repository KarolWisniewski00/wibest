<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentMessage extends Model
{
    use HasFactory;

    /**
     * Nazwa tabeli w bazie danych.
     *
     * @var string
     */
    protected $table = 'sent_messages'; 

    /**
     * Atrybuty, które można masowo przypisać (Mass Assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'recipient',
        'user_id',
        'company_id',
        'subject',
        'body',
        'status',
        'price',
    ];

    /**
     * Rzutowanie atrybutów na natywne typy PHP.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'float',
    ];

    // --- RELACJE ---

    /** Pracownik przypisany do tego bloku */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** Firma, w której odbywa się blok */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /** Użytkownik, który utworzył wpis */
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id')->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }
}