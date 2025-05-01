<?php

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaValidationException;
use Symfony\Component\HttpFoundation\Request;

class AlexaRequestValidator
{
    public function __construct(
        private PipelineLogger $logger,
        //        private array           $allowedApplicationIds,
    ) {
        //
    }

    public function validate(
        AlexaRequest $alexaRequest,
        Request $httpRequest,
    ): void {
        $this->logger->info('Validierung des Alexa-Requests wird gestartet.');

        if (!$this->isValidRequestAge($alexaRequest)) {
            $this->logger->error('Request ist zu alt.');
            throw new AlexaValidationException("Request ist zu alt.");
        }

        $signature = $httpRequest->headers->get('Signature');
        if (!$this->isValidSignature($signature)) {
            $this->logger->error('Signaturprüfung fehlgeschlagen.');
            throw new AlexaValidationException("Signaturprüfung fehlgeschlagen.");
        }

        $this->logger->info('Alexa-Request-Validierung erfolgreich.');
    }

    private function isValidRequestAge(AlexaRequest $alexaRequest): bool
    {
        return true; // @todo Hier könnte eine echte Prüfung implementiert werden.
    }

    private function isValidSignature(?string $signature): bool
    {
        return true; // @todo Hier könnte eine echte Signaturprüfung implementiert werden.
    }
}
