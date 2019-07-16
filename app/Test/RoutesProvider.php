<?php

declare(strict_types=1);

namespace App\Test;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

final class RoutesProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::get(
            'test',
            function () {
                dd(123);
            }
        );
    }
}
