<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Application\Repositories;

final class AllCountersCollection implements \Iterator, \Countable
{
    /**
     * @var string
     */
    private $currentElementKey = 0;

    /**
     * @var int[]
     */
    private $counters;

    public function __construct(?array $accounts = null)
    {
        if (null === $accounts) {
            $this->counters = [];
        } else {
            $this->counters = $accounts;
        }
        foreach ($this->counters as $carCast) {
            if (!$this->valid($carCast)) {
                throw new \InvalidArgumentException('Invalid arguments passed');
            }
        }
    }

    public function current(): int
    {
        return $this->counters[$this->currentElementKey];
    }

    public function next(): self
    {
        $this->currentElementKey++;
        return $this;
    }

    public function key(): string
    {
        return $this->currentElementKey;
    }

    public function valid($counter = null): bool
    {
        if (null !== $counter) {
            return is_int($counter);
        }
        return !empty($this->counters[$this->currentElementKey])
               && is_int($this->counters[$this->currentElementKey]);
    }

    public function rewind(): self
    {
        $this->currentElementKey = 0;
        return $this;
    }

    public function count(): int
    {
        return \count($this->counters);
    }
    
    public function add(string $key, int $counter): self
    {
        $this->counters[$key] = $counter;
        return $this;
    }
    
    public function toArray(): array
    {
        return $this->counters;
    }
}
