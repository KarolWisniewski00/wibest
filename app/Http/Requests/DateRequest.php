<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => 'Data rozpoczęcia jest wymagana.',
            'start_date.date' => 'Data rozpoczęcia musi być prawidłową datą.',
            'end_date.required' => 'Data zakończenia jest wymagana.',
            'end_date.date' => 'Data zakończenia musi być prawidłową datą.',
            'end_date.after_or_equal' => 'Data zakończenia musi być taka sama lub późniejsza niż data rozpoczęcia.',
        ];
    }
}
