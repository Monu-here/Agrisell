<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlaceOrdermail extends Mailable
{
    use Queueable, SerializesModels;
    public $orderName;
    public $productName;
    public $orderAddress;
    public $orderId;
    public $orders;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderName, $productName,$orderAddress,$orderId,$orders)
    {
        $this->orderName = $orderName;
        $this->productName = $productName;
        $this->orderAddress = $orderAddress;
        $this->orderId = $orderId;
        $this->orders=$orders;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Place Ordermail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.mail',
        );
    }
    public function build()
    {
        return $this->view('mail.mail') // Replace 'emails.place_order' with the actual view name
            ->subject('Your Order Confirmation'); // Set the email subject as needed
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
