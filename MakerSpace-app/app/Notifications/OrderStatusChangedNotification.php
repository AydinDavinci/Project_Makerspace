<?php

namespace App\Notifications;

use App\Models\order;
use Illuminate\Notifications\Notification;

class OrderStatusChangedNotification extends Notification
{

    public function __construct(protected order $order)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'message' => 'Your order status changed. The status is now: ' . ($this->order->status ?? 'unknown'),
            'status' => $this->order->status ?? null,
            'order_name' => $this->order->product_name ?? null,
        ];
    }
}

