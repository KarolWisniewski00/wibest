<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkSessionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time', // Sprawdzenie, czy end_time jest późniejsze lub równe start_time
            'status' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'start_time.required' => 'Pole start_time jest wymagane.',
            'start_time.date' => 'Pole start_time musi być prawidłową datą.',
            'end_time.required' => 'Pole end_time jest wymagane.',
            'end_time.date' => 'Pole end_time musi być prawidłową datą.',
            'end_time.after_or_equal' => 'Pole end_time musi być późniejsze lub równe start_time.',
            'status.required' => 'Pole status jest wymagane.',
            'status.string' => 'Pole status musi być ciągiem znaków.',
            'user_id.required' => 'Pole user_id jest wymagane.',
            'user_id.integer' => 'Pole user_id musi być liczbą całkowitą.',
            'user_id.exists' => 'Wybrany user_id nie istnieje w bazie danych.',
        ];
    }
}
