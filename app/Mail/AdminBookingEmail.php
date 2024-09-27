<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminBookingEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;

    /**
     * Create a new message instance.
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Admin Booking Confirmation Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.booking_admin_email',
            with: [
                'name' => $this->booking->name,
                'booking_ref' => $this->booking->booking_reference,
                'activity_name' => $this->booking->tour->name,
                'adult_count' => $this->booking->adult_count,
                'child_count' => $this->booking->child_count,
                'infant_count' => $this->booking->infant_count,
                'adult_price' => $this->booking->adult_price,
                'child_price' => $this->booking->child_price,
                'infant_price' => $this->booking->infant_price,
                'max_infant' => $this->booking->tour->infant_count,
                'fixed_charges' => $this->booking->fixed_charges,
                'fixed_charges_type' => $this->booking->fixed_charges_type,
                'booking_date' => $this->booking->booking_date,
                'time_slot' => $this->booking->time_slot,
                'subtotal' => $this->booking->subtotal,
                'total_vat' => $this->booking->total_vat,
                'grand_total' => $this->booking->grand_total,
                'payment_status' => $this->booking->payment_status,
                'payment_method' => $this->booking->payment_method,
                'email' => $this->booking->email,
                'phone' => $this->booking->phone,
                'address' => $this->booking->address,
                'location' => $this->booking->location,
                'postal_code' => $this->booking->postal_code
            ]
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
