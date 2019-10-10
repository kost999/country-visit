<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\Application\Service\VisitWriter;

use Jc9\CountryVisit\Application\Repositories\RepositoryException;
use Jc9\CountryVisit\Application\Repositories\VisitWriteRepository;
use Jc9\CountryVisit\Application\Service\VisitWriter\Dto\VisitWriterRequest;
use Jc9\CountryVisit\Application\Service\VisitWriter\Exceptions\VisitWritingFailedException;
use Jc9\CountryVisit\Domain\Factories\VisitFactory;
use Jc9\CountryVisit\Domain\Factories\VisitFactoryRequest;

final class VisitWriterImpl implements VisitWriter
{
    private $visitWriteRepository;
    private $visitFactory;

    public function __construct(
        VisitFactory $visitFactory,
        VisitWriteRepository $visitWriteRepository
    ) {
        $this->visitFactory         = $visitFactory;
        $this->visitWriteRepository = $visitWriteRepository;
    }

    public function execute(VisitWriterRequest $request): void
    {
        try {
            $this->visitWriteRepository->save(
                $this->visitFactory->createVisit(new VisitFactoryRequest($request->getCountryCode()))
            );
        } catch (RepositoryException $exception) {
            throw new VisitWritingFailedException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
