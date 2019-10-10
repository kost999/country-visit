<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Application\Service\VisitWriter\Dto;

final class VisitWriterRequest
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
