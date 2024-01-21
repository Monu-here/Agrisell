<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use App\Models\order;

class InvoicePaid extends Notification
{
    use Queueable;
    protected $order;
    protected $productName;
    protected $productImage;
    protected $userName;

    /**
     * Create a new notification instance.
     */
    public function __construct($order, $productName, $productImage)
    {
        $this->order = $order;
        $this->productName = $productName;
        $this->productImage = $productImage;
        // $this->userName = $userName;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        $phoneNumber = $this->order->phone_number;
        $slackPhoneNumber = "<tel:$phoneNumber|$phoneNumber>";
        return (new SlackMessage)
            ->content("$this->productName X {$this->order->qty}, is ordered by {$this->order->name} ")
            ->attachment(function ($attachment) use ($slackPhoneNumber) {
                $attachment->title('Call Customer')
                    ->content($slackPhoneNumber);
            })
            ->attachment(function ($attachment){
                $attachment->title('Product Image')
                ->image(asset($this->productImage));
            });
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
