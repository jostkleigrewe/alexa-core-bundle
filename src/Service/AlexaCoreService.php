<?php

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

readonly class AlexaCoreService
{
    public function __construct(
        private AlexaRequestValidator   $validator,
        private AlexaIntentDispatcher   $intentDispatcher,
        private AlexaResponseSerializer $responseSerializer,
        private PipelineLogger          $logger,
        private bool                    $debugMode = false
    ) {}

    /**
     * Führt die komplette Pipeline zur Verarbeitung eines Alexa-Requests aus:
     * 1. Validierung.
     * 2. Dispatch des Intents.
     * 3. Serialisierung der Antwort in eine JsonResponse.
     *
     * Prozess wird zusätzlich getimed und eventuelle Fehler werden zentral abgefangen.
     *
     * @param AlexaRequest $alexaRequest
     * @param Request $httpRequest
     * @return JsonResponse
     * @throws AlexaValidationException
     */
    public function handle(AlexaRequest $alexaRequest, Request $httpRequest): JsonResponse
    {
        // Lösche vorher gesammelte Logeinträge
        $this->logger->clear();

        $this->logger->info('Starte Pipeline zur Verarbeitung des Alexa-Requests.');
        $startTime = microtime(true);

        try {
            // 1. Validierung
            $this->logger->debug('Validierung wird gestartet.');
            $this->validator->validate($alexaRequest, $httpRequest);
            $this->logger->debug('Validierung abgeschlossen.');
            $timeAfterValidation = microtime(true);

            // 2. Intent-Dispatch
            $this->logger->debug('Intent-Dispatch wird gestartet.');
            $alexaResponse = $this->intentDispatcher->dispatch($alexaRequest);
            $this->logger->debug('Intent dispatched.');
            $timeAfterDispatch = microtime(true);

            // Vor der Serialisierung Debug-Informationen in die Response einfügen, wenn wir im Dev-Modus sind.
            if ($this->debugMode) {
                $alexaResponse->getDebug()->addMessage($this->logger->getLogEntries(), 'pipelineLogs');
            }

            // 3. Serialisierung der Antwort
            $this->logger->debug('Serialisierung der Response wird gestartet.');
            $jsonResponse = $this->responseSerializer->toJsonResponse($alexaResponse);
            $this->logger->debug('Serialisierung abgeschlossen.');
            $timeAfterSerialization = microtime(true);

            $totalTime = $timeAfterSerialization - $startTime;
            $this->logger->debug(sprintf(
                'Zeitmessung: Validierung=%.3fs, Dispatch=%.3fs, Serialisierung=%.3fs, Gesamt=%.3fs',
                $timeAfterValidation - $startTime,
                $timeAfterDispatch - $timeAfterValidation,
                $timeAfterSerialization - $timeAfterDispatch,
                $totalTime
            ));
            $this->logger->info('Pipeline abgeschlossen. Response wurde serialisiert.');

            return $jsonResponse;
        } catch (Throwable $e) {
            // Fehler zentral loggen
            $this->logger->error('Fehler in der Pipeline: ' . $e->getMessage(), ['exception' => $e]);
            // Optionale: Hier kann man über einen Error-Response-Service eine entsprechende Response erstellen.
            throw $e;
        }
    }
}
