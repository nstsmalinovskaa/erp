<?php

namespace App\Jobs;

use App\Models\Product;
use App\Services\Product\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;



class MailNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected NotificationService $service;
    protected Product $product;


    public function __construct(Product $product)
    {
        $this->service = app(NotificationService::class);
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->service->mailNotification($this->product);
    }
}
