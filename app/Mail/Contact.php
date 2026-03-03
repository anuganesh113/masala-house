<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Address;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
     public $details;
  

    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details;
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), 'sales@gmail.com'),
            replyTo: [
                new Address($this->details['email']),
            ],
            subject: 'Contact Message',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'site.mail.contact',
            with: [
                'details' => $this->details,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
       public function attachments(): array
    {
        if (isset($this->details['file']) && !is_null($this->details['file'])) {
            return [
                Attachment::fromPath(asset('storage/' . $this->details['file']))
                    ->as('attachment.pdf')
                    ->withMime('application/pdf'),
            ];
        } else {
            return [];
        }
    }
}
