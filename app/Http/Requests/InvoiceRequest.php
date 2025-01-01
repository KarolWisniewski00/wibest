<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'number' => 'nullable|string',
            'setting_format' => 'nullable|string',
            'issue_date' => 'required|date_format:d/m/Y',
            'sale_date' => 'required|date_format:d/m/Y',
            'invoice_type' => ['required', Rule::in(['faktura', 'faktura proforma', 'faktura sprzedażowa'])],
            'payment_date' => 'required|date_format:d/m/Y',
            'company_id' => 'required|integer',
            'seller_name' => 'required|string',
            'seller_adress' => 'required|string',
            'seller_vat_number' => 'required|regex:/^[0-9]{10}$/',
            'bank' => 'nullable|string',
            'buyer_name' => 'required|string',
            'client_id' => 'nullable|integer',
            'buyer_adress' => 'required|string',
            'buyer_vat_number' => 'required|regex:/^[0-9]{10}$/',
            'setting_client' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.name' => 'required|string',
            'items.*.quantity' => ['required', 'regex:/^\d+([.,]\d{1,2})?$/'], // zmiennoprzecinkowa
            'items.*.unit' => 'required|string',
            'items.*.price' => ['required', 'regex:/^\d+([.,]\d{1,2})?$/'], // zmiennoprzecinkowa
            'items.*.vat' => 'required|integer',
            'items.*.netto' => ['required', 'regex:/^\d+([.,]\d{1,2})?$/'], // zmiennoprzecinkowa
            'items.*.brutto' => ['required', 'regex:/^\d+([.,]\d{1,2})?$/'], // zmiennoprzecinkowa
            'paid' => ['required', Rule::in(['opłacono', 'opłacono częściowo'])],
            'paid_part' => ['nullable', 'regex:/^\d+([.,]\d{1,2})?$/'], // zmiennoprzecinkowa
            'payment_method' => 'required|string',
            'notes' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'issue_date.required' => 'Data wystawienia jest wymagana.',
            'issue_date.date_format' => 'Data wystawienia musi być w formacie dd/mm/RRRR.',
            'sale_date.required' => 'Data sprzedaży jest wymagana.',
            'sale_date.date_format' => 'Data sprzedaży musi być w formacie dd/mm/RRRR.',
            'invoice_type.required' => 'Typ faktury jest wymagany.',
            'invoice_type.in' => 'Wybrany typ faktury jest nieprawidłowy.',
            'payment_date.required' => 'Data płatności jest wymagana.',
            'payment_date.date_format' => 'Data płatności musi być w formacie dd/mm/RRRR.',
            'company_id.required' => 'ID firmy jest wymagane.',
            'company_id.integer' => 'ID firmy musi być liczbą całkowitą.',
            'seller_name.required' => 'Nazwa sprzedawcy jest wymagana.',
            'seller_adress.required' => 'Adres sprzedawcy jest wymagany.',
            'seller_vat_number.required' => 'Numer VAT sprzedawcy jest wymagany.',
            'seller_vat_number.regex' => 'Numer VAT sprzedawcy musi składać się z 10 cyfr.',
            'buyer_name.required' => 'Nazwa kupującego jest wymagana.',
            'buyer_adress.required' => 'Adres kupującego jest wymagany.',
            'buyer_vat_number.required' => 'Numer VAT kupującego jest wymagany.',
            'buyer_vat_number.regex' => 'Numer VAT kupującego musi składać się z 10 cyfr.',
            'items.required' => 'Przynajmniej jeden przedmiot jest wymagany.',
            'items.array' => 'Przedmioty muszą być tablicą.',
            'items.min' => 'Przynajmniej jeden przedmiot jest wymagany.',
            'items.*.name.required' => 'Nazwa przedmiotu jest wymagana.',
            'items.*.quantity.required' => 'Ilość przedmiotu jest wymagana.',
            'items.*.quantity.regex' => 'Ilość przedmiotu musi być liczbą zmiennoprzecinkową.',
            'items.*.unit.required' => 'Jednostka przedmiotu jest wymagana.',
            'items.*.price.required' => 'Cena przedmiotu jest wymagana.',
            'items.*.price.regex' => 'Cena przedmiotu musi być liczbą zmiennoprzecinkową.',
            'items.*.vat.required' => 'VAT przedmiotu jest wymagany.',
            'items.*.netto.required' => 'Cena netto przedmiotu jest wymagana.',
            'items.*.netto.regex' => 'Cena netto przedmiotu musi być liczbą zmiennoprzecinkową.',
            'items.*.brutto.required' => 'Cena brutto przedmiotu jest wymagana.',
            'items.*.brutto.regex' => 'Cena brutto przedmiotu musi być liczbą zmiennoprzecinkową.',
            'paid.required' => 'Status płatności jest wymagany.',
            'paid.in' => 'Wybrany status płatności jest nieprawidłowy.',
            'paid_part.regex' => 'Częściowa płatność musi być liczbą zmiennoprzecinkową.',
            'payment_method.required' => 'Metoda płatności jest wymagana.',
        ];
    }
}
