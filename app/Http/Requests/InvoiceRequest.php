<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'number' => 'required|string|unique:invoices,number',
            'invoice_type' => 'required|in:invoice,invoice_proform',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'company_id' => 'required|exists:companies,id',
            'seller_name' => 'required|string',
            'seller_address' => 'required|string',
            'seller_tax_id' => 'required|string',
            'client_id' => 'nullable|exists:clients,id',
            'buyer_name' => 'required|string',
            'buyer_address' => 'required|string',
            'buyer_tax_id' => 'required|string',
            'items' => 'required|array',
            'items.*.name' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.vat_rate' => 'required|numeric|min:0|max:100',
            'items.*.subtotal' => 'required|numeric|min:0',
            'items.*.vat_amount' => 'required|numeric|min:0',
            'items.*.total' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
            'vat' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'payment_method' => 'nullable|string',
            'notes' => 'nullable|string',
        ];
    }
}
