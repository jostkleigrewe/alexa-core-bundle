<?php

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaDispatchException;
use Jostkleigrewe\AlexaCoreBundle\Intent\IntentCollection;
use Jostkleigrewe\AlexaCoreBundle\Intent\IntentInterface;

class AlexaIntentDispatcher
{
    public const string SERVICE_TAG = 'alexa_core.intent';

    public function __construct(
        private readonly IntentCollection $intentCollection,
        private readonly AlexaResponseService $responseService,
        private readonly PipelineLogger $logger,
    ) {
    }

    /**
     * Dispatches the incoming AlexaRequest to a matching intent handler.
     * Returns either the handler's AlexaResponse or a standardized error response.
     */
    public function dispatch(AlexaRequest $alexaRequest): AlexaResponse
    {
        $type       = $alexaRequest->getRequest()->getType()->value;
        $intentName = $alexaRequest->getRequest()->getIntent()?->name;

        $this->logger->debug('Dispatching AlexaRequest', [
            'requestType' => $type,
            'intentName'  => $intentName,
        ]);

        try {
            $handler = $this->findHandler($alexaRequest);

            if ($handler === null) {
                $this->logger->warning('No matching intent handler found', [
                    'requestType' => $type,
                    'intentName'  => $intentName,
                ]);

                // Kein Handler: fallback auf Error-Response
                throw new AlexaDispatchException('No intent handler available for this request. [' . ($intentName ?? $type) . ']');
            }

            return $handler->execute($alexaRequest);
        } catch (AlexaDispatchException $e) {
            // Domänenfehler: userfreundliche Fehlermeldung
            $this->logger->error('Domain error during dispatch', ['exception' => $e]);
            return $this->responseService->createErrorResponse($e);
        } catch (\Throwable $e) {
            // Unvorhergesehene Fehler
            $this->logger->error('Unexpected error during dispatch', ['exception' => $e]);
            return $this->responseService->createErrorResponse($e);
        }
    }

    /**
     * Finds a matching IntentInterface handler or returns null if none found.
     */
    private function findHandler(AlexaRequest $request): ?IntentInterface
    {
        // First, try non-fallback handlers
        foreach ($this->intentCollection->getHandlers() as $handler) {
            if (!$handler->isFallback() && $handler->isValidForRequest($request)) {
                $this->logger->info('Matched handler (no fallback)', ['handler' => get_class($handler)]);
                return $handler;
            }
        }

        // Then, try fallback handlers
        foreach ($this->intentCollection->getHandlers() as $handler) {
            if ($handler->isFallback() && $handler->isValidForRequest($request)) {
                $this->logger->info('Matched fallback handler', ['handler' => get_class($handler)]);
                return $handler;
            }
        }

        return null;
    }

    /**
     * Returns the full IntentCollection (for debugging or introspection).
     */
    public function getIntentCollection(): IntentCollection
    {
        return $this->intentCollection;
    }
}
