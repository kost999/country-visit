<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Application\Repositories;

use Jc9\CountryVisit\Domain\Entities\Visit;

interface VisitWriteRepository
{
    /**
     * @param Visit $visit
     *                    
     * @throws RepositoryException
     */
    public function save(Visit $visit): void;
}
