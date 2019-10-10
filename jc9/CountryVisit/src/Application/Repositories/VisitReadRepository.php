<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Application\Repositories;

interface VisitReadRepository
{
    /**
     * @return AllCountersCollection
     *
     * @throws RepositoryException
     */
    public function getAllCounters(): AllCountersCollection;
}
