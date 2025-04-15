<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderShippedNotification extends Notification
{
    use Queueable;

    public $order_id;
    public $orderGroup;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order_id, $orderGroup)
    {
        $this->order_id = $order_id;
        $this->orderGroup = $orderGroup;
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
        return (new MailMessage)
        ->subject('Đơn hàng của bạn đã được giao cho đơn vị vận chuyển!')
        ->greeting('Xin chào ' . $this->orderGroup->first()->name . ',')
        ->line('Đơn hàng #' . $this->order_id . ' của bạn đã được giao cho đơn vị vận chuyển.')
        ->line('Chi tiết đơn hàng:')
        ->line($this->getProductDetails())
        ->line('Tổng giá tiền: ' . $this->orderGroup->first()->total_price . ' VND')
        ->line('Cảm ơn bạn đã mua hàng từ chúng tôi!')
        ->salutation('Trân trọng,');
    }

    protected function getProductDetails()
    {
        $details = '';
        foreach ($this->orderGroup as $order) {
            $details .= $order->product_title . ' (x' . $order->quantity . '), ';
        }

        return rtrim($details, ', ');
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
