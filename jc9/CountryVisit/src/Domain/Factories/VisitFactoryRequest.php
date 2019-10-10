<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Domain\Factories;

final class VisitFactoryRequest
{
    /**
     * @var 
     */
    private $countryCode;

    public function __construct($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }
}
