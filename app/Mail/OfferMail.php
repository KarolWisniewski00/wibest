<?php

namespace App\Mail;

use App\Models\OfferItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class OfferMail extends Mailable
{
    use Queueable, SerializesModels;

    public $offer;
    public $pdf;

    public function __construct($offer, $pdf)
    {
        $this->offer = $offer;
        $this->pdf = $pdf;
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.offer',
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
        $offerNumber = str_replace([' ', '/'], '-', $this->offer->number);
        $offer_obj = $this->offer;
        $items = OfferItem::where('offer_id', $this->offer->id)->get();
        $this->offer = [
            'number' => $offer_obj->number,
            'user' => $offer_obj->user->name,
        ];
        return $this->subject('Oferta ' . $offer_obj->seller_name . ' ' . $offer_obj->number)
            ->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))
            ->view('emails.offer')
            ->attachData($this->pdf->output(), 'oferta-' . $offer_obj->seller_name . '-' . $offerNumber . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
