<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Infrastructure\Repositories;

use Jc9\CountryVisit\Application\Repositories\AllCountersCollection;
use Jc9\CountryVisit\Application\Repositories\RepositoryException;
use Jc9\CountryVisit\Application\Repositories\VisitReadRepository;
use Jc9\CountryVisit\Application\Repositories\VisitWriteRepository;
use Jc9\CountryVisit\Domain\Entities\Visit;
use Illuminate\Support\Facades\Redis;

final class RedisVisitRepository implements VisitWriteRepository, VisitReadRepository
{
    private $redisConnection;
    private static $keyPrefix = 'country_visit_';

    public function __construct()
    {
        $this->redisConnection = Redis::connection();
    }

    public function save(Visit $visit): void
    {
        try {
            $this->redisConnection->incrby(self::$keyPrefix . $visit->getCountryCode(), 1);
        } catch (\Throwable $exception) {
            throw new RepositoryException($exception->getMessage(), 0, $exception);
        }
    }

    public function getAllCounters(): AllCountersCollection
    {
        $keys = $this->redisConnection->keys(self::$keyPrefix . '*');

        if (empty($keys)) {
            return new AllCountersCollection();
        }

        $countersCollection = new AllCountersCollection();
        $values = $this->redisConnection->mget($keys);
        foreach ($keys as $intKey => $key) {
            $countersCollection->add(str_replace(self::$keyPrefix, '', $key), (int)$values[$intKey]);
        }

        return $countersCollection;
    }
}
