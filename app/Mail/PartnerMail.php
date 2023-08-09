<?php

namespace App\Mail;

use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Union;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PartnerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phoneNumber;
    public $reason;
    public $district;
    public $division;
    public $upazila;
    public $union;

    public function build()
    {
        return $this->markdown('emails.partner_email')
            ->subject('KSL Partner With Us');
    }
    public function __construct(
        $name,
        $email,
        $phoneNumber,
        $reason,
        District $district,
        Division $division,
        Upazila $upazila,
        Union $union,
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->reason = $reason;
        $this->district = $district;
        $this->division = $division;
        $this->upazila = $upazila;
        $this->union = $union;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'KSL-Partner With Us Mail'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name'
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
}
