<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'company_id',
        'client_id',
        'issue_date',

        'users',
        'price_per_user',
        'monthly_price',

        'problem_description',
        'created_by',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    /* Relacje */

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function client()
    {
        return $this->belongsTo(Company::class, 'client_id');
        // 👆 ta sama tabela, inna rola – bardzo OK
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by')
            ->withDefault(['name' => 'Usunięty użytkownik']);
    }
}
