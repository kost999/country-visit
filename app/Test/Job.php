<?php

declare(strict_types=1);

namespace App\Test;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Psr\Log\LoggerInterface;

final class Job implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    private $int;

    public function __construct(int $int)
    {
        $this->int = $int;

        $this->onConnection('redis');
        $this->onQueue('{long_rent_prepare_call_task_create_job}');
    }

    public function handle(LoggerInterface $logger): void
    {
        dump($this->int);
        $logger->error(
            'Message',
            [
                'int' => $this->int,
            ]
        );
    }
}
