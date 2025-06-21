<?php

namespace App\Mail;

use App\Models\OfferItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class LeaveMailReject extends Mailable
{
    use Queueable, SerializesModels;

    public $leave;

    public function __construct($leave)
    {
        $this->leave = $leave;
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.leave-reject',
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
        $leave_obj = $this->leave;
        return $this->subject('Wniosek ' . $leave_obj->type . ' ' . $leave_obj->start_date . ' - ' . $leave_obj->end_date)
            ->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))
            ->view('emails.leave-reject');
    }
}
