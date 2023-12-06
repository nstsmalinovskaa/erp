<?php

namespace App\Jobs;

use App\Models\Product;
use App\Notifications\Product\CreatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;


class MailNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct(protected Product $product)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::route('mail', config('products.email'))
            ->notify(new CreatedNotification($this->product));
    }
}
