<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\UserInterface\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Jc9\CountryVisit\Application\Repositories\RepositoryException;
use Jc9\CountryVisit\Application\Repositories\VisitReadRepository;
use Jc9\CountryVisit\Application\Service\VisitWriter\Dto\VisitWriterRequest;
use Jc9\CountryVisit\Application\Service\VisitWriter\Exceptions\VisitWritingFailedException;
use Jc9\CountryVisit\Application\Service\VisitWriter\VisitWriter;
use Jc9\CountryVisit\UserInterface\Controllers\Requests\CountryVisitStoreRequest;
use Psr\Log\LoggerInterface;

final class CountryVisitController extends Controller
{
    public function index(VisitReadRepository $visitReadRepository, LoggerInterface $logger): JsonResponse
    {
        try {
            return response()->json(
                $visitReadRepository->getAllCounters()->toArray()
            );
        } catch (RepositoryException $exception) {
            $logger->error(
                'Visits reading failed',
                [
                    'message' => $exception->getMessage(),
                    'trace'   => $exception->getTraceAsString(),
                ]
            );
            return response()->json(
                [
                    'message' => 'Visits reading failed',
                ],
                500
            );
        }

    }

    public function store(
        CountryVisitStoreRequest $request,
        VisitWriter $visitWriter,
        LoggerInterface $logger
    ): JsonResponse {
        try {
            $visitWriter->execute(new VisitWriterRequest($request->getCountryCode()));

            return response()->json(
                [
                    'status' => 'success',
                ]
            );
        } catch (VisitWritingFailedException $exception) {
            $logger->error(
                'Visit writing failed',
                [
                    'country' => $request->getCountryCode(),
                    'message' => $exception->getMessage(),
                    'trace'   => $exception->getTraceAsString(),
                ]
            );
            return response()->json(
                [
                    'message' => 'Visit writing failed',
                ],
                500
            );
        }
    }
}
