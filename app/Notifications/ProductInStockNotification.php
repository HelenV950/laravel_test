<?php

namespace App\Notifications;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductInStockNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @var Product
     */

     protected $product;

         


    public function __construct(Product $product)
    {
        $this->product = $product;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('products.show', $this->product);

        return (new MailMessage)
                    ->subject('Product from wish list in stock!')
                    ->line('Hello, '. ucfirst($notifiable->name) . 'product from your wish list already in stock! Hurry up!')
                    ->line('The introduction to the notification.')
                    ->action('Product Page', $url)
                    ->line('Thank you for using our website!')
                    ->line('Kind Regards, Laravel.');
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
}
