<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Application\Entities;

use Jc9\CountryVisit\Domain\Entities\Visit;

final class VisitImmutable implements Visit
{
    /**
     * @var string
     */
    private $countryCode;

    public function __construct(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }
}
