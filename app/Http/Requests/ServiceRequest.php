<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Określa, czy użytkownik jest uprawniony do złożenia tego wniosku.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Zakładam, że każdy uprawniony użytkownik może dodać usługę
    }

    /**
     * Określa reguły walidacji dla żądania.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'unit_price' => 'nullable|numeric|min:0',
            'subtotal' => 'nullable|numeric|min:0',
            'vat_rate' => 'nullable|numeric|min:0|max:100',
            'vat_amount' => 'nullable|numeric|min:0',
            'total' => 'nullable|numeric|min:0',
            'description' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Określa komunikaty walidacyjne.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nazwa usługi jest wymagana.',
            'name.string' => 'Nazwa usługi musi być tekstem.',
            'unit_price.numeric' => 'Cena jednostkowa musi być liczbą.',
            'subtotal.numeric' => 'Wartość netto musi być liczbą.',
            'vat_rate.numeric' => 'Stawka VAT musi być liczbą.',
            'vat_rate.max' => 'Stawka VAT nie może przekraczać 100%.',
            'vat_amount.numeric' => 'Kwota VAT musi być liczbą.',
            'total.numeric' => 'Wartość brutto musi być liczbą.',
            'description.string' => 'Opis usługi musi być tekstem.',
        ];
    }
}
