<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Pobierz reguły walidacji dla tego wniosku.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'email2' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'phone2' => 'nullable|string|max:20',
            'vat_number' => 'required|string|max:15',
            'adress' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ];
    }

    /**
     * Pobierz niestandardowe komunikaty walidacji dla tego wniosku.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nazwa jest wymagana.',
            'name.string' => 'Nazwa musi być ciągiem tekstowym.',
            'name.max' => 'Nazwa nie może mieć więcej niż 255 znaków.',
            'email.email' => 'Podaj poprawny adres e-mail.',
            'email.max' => 'Adres e-mail nie może mieć więcej niż 255 znaków.',
            'phone.required' => 'Numer telefonu jest wymagany.',
            'phone.string' => 'Numer telefonu musi być ciągiem tekstowym.',
            'phone.max' => 'Numer telefonu nie może mieć więcej niż 20 znaków.',
            'vat_number.required' => 'NIP jest wymagany.',
            'vat_number.string' => 'NIP musi być ciągiem tekstowym.',
            'vat_number.max' => 'NIP nie może mieć więcej niż 15 znaków.',
            'adress.required' => 'Adres jest wymagany.',
            'adress.string' => 'Adres musi być ciągiem tekstowym.',
            'adress.max' => 'Adres nie może mieć więcej niż 255 znaków.',
            'city.required' => 'Miasto jest wymagane.',
            'city.string' => 'Miasto musi być ciągiem tekstowym.',
            'city.max' => 'Miasto nie może mieć więcej niż 100 znaków.',
            'postal_code.required' => 'Kod pocztowy jest wymagany.',
            'postal_code.string' => 'Kod pocztowy musi być ciągiem tekstowym.',
            'postal_code.max' => 'Kod pocztowy nie może mieć więcej niż 10 znaków.',
            'notes.string' => 'Uwagi muszą być ciągiem tekstowym.',
        ];
    }
}
