<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Infrastructure\Factories;

use Jc9\CountryVisit\Application\Entities\VisitImmutable;
use Jc9\CountryVisit\Domain\Entities\Visit;
use Jc9\CountryVisit\Domain\Factories\VisitFactory;
use Jc9\CountryVisit\Domain\Factories\VisitFactoryRequest;

final class VisitsFactoryImpl implements VisitFactory
{
    public function createVisit(VisitFactoryRequest $request): Visit
    {
        return new VisitImmutable($request->getCountryCode());
    }
}
