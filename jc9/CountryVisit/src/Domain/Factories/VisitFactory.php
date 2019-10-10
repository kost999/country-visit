<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Domain\Factories;

use Jc9\CountryVisit\Domain\Entities\Visit;

interface VisitFactory
{
    /**
     * @param VisitFactoryRequest $request
     *
     * @return Visit
     */
    public function createVisit(VisitFactoryRequest $request): Visit;
}
