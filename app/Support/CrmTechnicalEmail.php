<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CrmTechnicalEmail
{
    public static function generate(): string
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $email = 'crm-'.Str::uuid().'@users.wibest.invalid';
            if (! DB::table('users')->whereRaw('LOWER(TRIM(email)) = ?', [$email])->exists()) {
                return $email;
            }
        }

        throw ValidationException::withMessages([
            'email' => 'Nie udało się wygenerować adresu technicznego. Spróbuj ponownie.',
        ]);
    }

    public static function isTechnical(?string $email): bool
    {
        return $email !== null && str_ends_with(mb_strtolower(trim($email)), '@users.wibest.invalid');
    }
}
