<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    /**
     * Określa, czy użytkownik jest autoryzowany do wykonania tej prośby.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Zasady walidacji dla aktualizacji firmy.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'adress' => ['required', 'string', 'max:255'],
            'vat_number' => [
                'required',
                'digits:10',
                Rule::unique('companies', 'vat_number')->ignore($this->client->id),
            ],
        ];
    }

    /**
     * Komunikaty walidacji.
     */
    public function messages(): array
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
