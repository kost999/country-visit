<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Application\Service\VisitWriter;

use Jc9\CountryVisit\Application\Service\VisitWriter\Dto\VisitWriterRequest;
use Jc9\CountryVisit\Application\Service\VisitWriter\Exceptions\VisitWritingFailedException;

interface VisitWriter
{
    /**
     * @param VisitWriterRequest $request
     *
     * @throws VisitWritingFailedException
     */
    public function execute(VisitWriterRequest $request): void;
}
