<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserInput
{
    public static function normalize(array $data): array
    {
        if (is_string($data['name'] ?? null)) {
            $data['name'] = trim(preg_replace('/\s+/u', ' ', $data['name']));
        }
        if (is_string($data['email'] ?? null)) {
            $data['email'] = mb_strtolower(trim($data['email']));
            $data['email'] = $data['email'] === '' ? null : $data['email'];
        }
        if (is_string($data['phone'] ?? null)) {
            $phone = trim($data['phone']);
            if (preg_match('/^(?:\+48|0048)?[0-9\s-]+$/D', $phone)) {
                $digits = preg_replace('/\D/', '', $phone);
                if (str_starts_with($digits, '0048')) {
                    $digits = substr($digits, 4);
                } elseif (strlen($digits) === 11 && str_starts_with($digits, '48')) {
                    $digits = substr($digits, 2);
                }
                if (strlen($digits) === 9) {
                    $phone = '+48 '.implode(' ', str_split($digits, 3));
                }
            }
            $data['phone'] = $phone === '' ? null : $phone;
        }

        return $data;
    }

    public static function rules(bool $crm = false, ?int $ignoreUserId = null): array
    {
        return [
            'name' => [$crm ? 'nullable' : 'required', 'string', 'max:255'],
            'email' => ['bail', $crm ? 'nullable' : 'required', 'string', 'max:255', 'email:rfc',
                'regex:/^[^\s@]+@(?:[\pL0-9](?:[\pL0-9-]*[\pL0-9])?\.)+(?:[\pL]{2,}|xn--[A-Za-z0-9-]+)$/u',
                Rule::unique('users', 'email')->ignore($ignoreUserId),
                function ($attribute, $value, $fail) use ($ignoreUserId) {
                    if (DB::table('users')->when($ignoreUserId !== null, fn ($query) => $query->where('id', '!=', $ignoreUserId))
                        ->whereRaw('LOWER(TRIM(email)) = ?', [$value])->exists()) {
                        $fail('Ten adres e-mail jest już wykorzystywany.');
                    }
                }],
            'phone' => [$crm ? 'nullable' : 'required', 'string', 'regex:/^\+48 [0-9]{3} [0-9]{3} [0-9]{3}$/D'],
            'position' => ['nullable', 'string', 'max:255'],
        ];
    }

    public static function messages(): array
    {
        return [
            'email.required' => 'Podaj adres e-mail.',
            'email.email' => 'Wpisz poprawny adres e-mail, np. jan@firma.pl.',
            'email.regex' => 'Wpisz poprawny adres e-mail, np. jan@firma.pl.',
            'email.unique' => 'Ten adres e-mail jest już wykorzystywany.',
            'phone.required' => 'Podaj 9-cyfrowy numer telefonu.',
            'phone.regex' => 'Podaj poprawny 9-cyfrowy numer telefonu.',
            'name.required' => 'Podaj imię i nazwisko.',
        ];
    }
}
