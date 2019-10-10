<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Jc9\CountryVisit\Application\Repositories\VisitReadRepository;
use Jc9\CountryVisit\Application\Repositories\VisitWriteRepository;
use Jc9\CountryVisit\Application\Service\VisitWriter\VisitWriter;
use Jc9\CountryVisit\Application\Service\VisitWriter\VisitWriterImpl;
use Jc9\CountryVisit\Domain\Factories\VisitFactory;
use Jc9\CountryVisit\Infrastructure\Factories\VisitsFactoryImpl;
use Jc9\CountryVisit\Infrastructure\Repositories\RedisVisitRepository;

final class CountryVisitProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
        
        $this->app->bind(
            VisitWriter::class,
            VisitWriterImpl::class
        );
        $this->app->bind(
            VisitWriteRepository::class,
            RedisVisitRepository::class
        );
        $this->app->bind(
            VisitReadRepository::class,
            RedisVisitRepository::class
        );
        $this->app->bind(
            VisitFactory::class,
            VisitsFactoryImpl::class
        );
    }
}
