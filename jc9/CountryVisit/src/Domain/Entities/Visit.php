<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Domain\Entities;

interface Visit
{
    public function getCountryCode(): string;
}
