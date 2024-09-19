<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'bank' => 'nullable|string|max:255',
            'vat_number' => 'required|string|max:20',
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
            'street.required' => 'Ulica jest wymagana.',
            'building_number.required' => 'Numer budynku jest wymagany.',
            'post_code.required' => 'Kod pocztowy jest wymagany.',
            'city.required' => 'Miasto jest wymagane.',
            'vat_number.required' => 'Numer NIP jest wymagany.',
        ];
    }
}
