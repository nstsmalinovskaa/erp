<?php

namespace App\Services\Product;

use App\Notifications\Product\CreatedNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Product;

class NotificationService {



    public function mailNotification(Product $product): void
    {
        Notification::route('mail', config('products.email'))
            ->notify(new CreatedNotification($product));
    }
}
