<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

final class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('/api/{version}')
             ->middleware('api')
             ->namespace('Jc9\CountryVisit\UserInterface\Controllers')
             ->group(__DIR__ . '/../../../routes/api.php');
    }
}
