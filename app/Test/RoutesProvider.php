<?php

declare(strict_types=1);

namespace App\Test;

use BelkaCar\PhpLibHttpLayer\Exceptions\NotFoundException;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

final class RoutesProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::get(
            'test',
            function (Request $request) {

                throw new NotFoundException(
                    'message',
                    [
                        'detail1' => 'dffdfd',
                    ]
                );
                
                $int = (int)$request->query('int');
                dispatch(new Job($int));
                return response()->json(
                    [
                        'message' => 'job dispatched',
                        'int'     => $int,
                    ]
                );
            }
        );
    }
}
