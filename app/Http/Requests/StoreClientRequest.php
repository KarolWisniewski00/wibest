<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Określa, czy użytkownik jest autoryzowany do wykonania tej prośby.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Określa zasady walidacji dla tego żądania.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            // vat_number: wymagany, tylko cyfry, 10 znaków, unikalny
            'vat_number' => [
                'required',
                'digits:10',              // dokładnie 10 cyfr
                'unique:companies,vat_number', // unikalny w tabeli
            ],
        ];
    }

    /**
     * Określa niestandardowe komunikaty walidacji.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nazwa firmy jest wymagana.',
            'adress.required' => 'Miasto jest wymagane.',
            'vat_number.required' => 'Numer NIP jest wymagany.',
            'vat_number.digits' => 'Numer NIP musi zawierać dokładnie 10 cyfr.',
            'vat_number.unique' => 'Firma z tym numerem NIP już istnieje.',
        ];
    }
}
