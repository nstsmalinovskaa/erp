<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update', function (?User $user, Product $product, array $data) {
            if (config('products.role') !== 'admin' && $product->article !== $data['article']) {
                return false;
            }
            return true;
        });
    }
}
