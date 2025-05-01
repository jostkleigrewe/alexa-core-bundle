<?php

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class AlexaResponseSerializer
{
    public function __construct(
        private SerializerInterface $serializer,
        private PipelineLogger      $logger,
    ) {}

    /**
     * Wandelt das AlexaResponse-DTO in eine JsonResponse um.
     *
     * @param AlexaResponse $alexaResponse
     * @return JsonResponse
     */
    public function toJsonResponse(AlexaResponse $alexaResponse): JsonResponse
    {
        $this->logger->info('Starting serialization of AlexaResponse.');
        $serializedResponse = $this->serializer->serialize(
            data: $alexaResponse,
            format: 'json',
            context: ['skip_null_values' => true]
        );
        $statusCode = $alexaResponse->getStatusCode();
        $this->logger->debug('Serialized Response: ' . $serializedResponse);

        $this->logger->info('Serialization complete and JsonResponse created.');
        return JsonResponse::fromJsonString($serializedResponse, $statusCode, $additionalHeaders ?? [])
            ->setSharedMaxAge(300);
    }
}
