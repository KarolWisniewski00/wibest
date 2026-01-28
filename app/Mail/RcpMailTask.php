<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;

class RcpMailTask extends Mailable
{
    use Queueable, SerializesModels;

    public $work_session;

    public function __construct($work_session)
    {
        $this->work_session = $work_session;
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.rcp-task',
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
        $work_session = $this->work_session;
        return $this->subject('Zadanie ' . $work_session->user->name . ' ' . $work_session->task->time)
            ->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))
            ->view('emails.rcp-task');
    }
}
