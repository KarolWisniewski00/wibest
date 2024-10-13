<?php

namespace App\Mail;

use App\Models\InvoiceItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public $pdf;

    public function __construct($invoice, $pdf)
    {
        $this->invoice = $invoice;
        $this->pdf = $pdf;
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice',
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    public function build()
    {
        $invoiceNumber = str_replace([' ', '/'], '-', $this->invoice->number);
        $invoice_obj = $this->invoice;
        $items = InvoiceItem::where('invoice_id', $this->invoice->id)->get();
        $this->invoice = [
            'number' => $invoice_obj->number,
            'user' => $invoice_obj->user->name,
            'invoice_type' => $invoice_obj->invoice_type,
            'issue_date' => $invoice_obj->issue_date,
            'due_date' => $invoice_obj->due_date,
            'status' => $invoice_obj->status,
            'client' => [
                'name' => $invoice_obj->buyer_name,
                'address' => $invoice_obj->buyer_adress,
                'tax_id' => $invoice_obj->seller_tax_id
            ],
            'items' => $items,
            'seller' => [
                'name' => $invoice_obj->seller_name,
                'address' => $invoice_obj->seller_adress,
                'tax_id' => $invoice_obj->seller_tax_id,
                'bank' => $invoice_obj->seller_bank
            ],
            'subtotal' => $invoice_obj->subtotal,
            'vat' => $invoice_obj->vat,
            'total' => $invoice_obj->total,
            'notes' => $invoice_obj->notes,
            'payment_method' => $invoice_obj->payment_method,
            'total_in_words' => $invoice_obj->total_in_words
        ];
        return $this->subject('Faktura ' . $invoice_obj->seller_name . ' ' . $invoice_obj->number)
            ->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))
            ->view('emails.invoice')
            ->attachData($this->pdf->output(), 'faktura-' . $invoice_obj->seller_name . '-' . $invoiceNumber . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
