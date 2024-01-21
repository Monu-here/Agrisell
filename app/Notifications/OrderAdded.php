<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class OrderAdded extends Notification
{
    use Queueable;

    protected $orders;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($_orders)
    {
        $this->orders=$_orders;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toSlack($notifiable)
    {
        $phoneNumber = $this->orders[0]->phone_number;
        $slackPhoneNumber = "<tel:$phoneNumber|$phoneNumber>";


        $message=(new SlackMessage())
        ->content("Following orders are ordered by {$this->orders[0]->name} ")
        ->attachment(function ($attachment) use ($slackPhoneNumber) {
            $attachment->title('Call Customer')
                ->content($slackPhoneNumber);
        });

        foreach ($this->orders as $key => $order) {
            $message
            ->attachment(function ($attachment) use ($order) {
                        $attachment->title("$order->productName X $order->qty")
                            ->image(asset($order->productImage));
                    });

        }
        return $message;
    }
}
