<?php

declare(strict_types=1);

namespace App\Test;

use Illuminate\Support\ServiceProvider;

final class Provider extends ServiceProvider
{
    public function register(): void
    {
    }
    
    public function boot(): void
    {
        $this->app->register(RoutesProvider::class);
    }
}
