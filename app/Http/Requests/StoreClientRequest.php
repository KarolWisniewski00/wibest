<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Zasady walidacji, które będą stosowane do żądania.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'email2' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'phone2' => 'nullable|string|max:20',
            'vat_number' => 'required|string|max:20',
            'adress' => 'required|string|max:255',
            'notes' => 'nullable|string|max:255',
        ];
    }

    /**
     * Spersonalizowane komunikaty walidacji.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Pole nazwa jest wymagane.',
            'email.required' => 'Pole email jest wymagane.',
            'email.email' => 'Wprowadź poprawny adres email.',
            'phone.required' => 'Pole telefon jest wymagane.',
            'vat_number.required' => 'Pole NIP jest wymagane.',
            'adress.required' => 'Pole adres jest wymagane.',
            'city.required' => 'Pole miasto jest wymagane.',
            'postal_code.required' => 'Pole kod pocztowy jest wymagane.',
        ];
    }
}
