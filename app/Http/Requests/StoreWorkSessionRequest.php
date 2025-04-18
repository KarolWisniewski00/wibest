<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // lub np. auth()->user()->can(...)
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Wybierz użytkownika.',
            'start_time.required' => 'Podaj czas rozpoczęcia.',
            'end_time.after_or_equal' => 'Czas zakończenia nie może być wcześniejszy niż rozpoczęcia.',
        ];
    }
}

