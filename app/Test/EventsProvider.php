<?php

declare(strict_types=1);

namespace App\Test;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;

final class EventsProvider extends EventServiceProvider
{
    protected $listen = [
        Event::class => [
            Listener::class
        ],
    ];
}
