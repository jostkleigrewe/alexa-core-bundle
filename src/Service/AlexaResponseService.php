<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponseResponseCardImage;
use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\ResponseCardType;
use ReflectionClass;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Throwable;

/**
 * Service zur Erzeugung und Verwaltung der AlexaResponse.
 *
 * Dieser Service erstellt Antworten (AlexaResponse) basierend auf einem AlexaRequest oder einer Exception.
 * Insbesondere wird bei Fehlern im Debug-Modus eine detaillierte Fehler-Response erzeugt,
 * die u.a. Exception-Daten in der Debug-Section der Response beinhaltet.
 *
 * Log messages and exceptions remain in English.
 */
readonly class AlexaResponseService
{
    /**
     * Konstruktor.
     *
     * @param PipelineLogger      $logger      PipelineLogger, der auch Debug-Informationen sammelt
     * @param bool                $debugMode   Flag: true, wenn zusätzliche Debug-Informationen in der Response ausgegeben werden sollen
     */
    public function __construct(private PipelineLogger $logger, private bool $debugMode = false,)
    {
        // ...
    }

    /**
     * Erzeugt einen neuen AlexaResponse basierend auf einem AlexaRequest.
     * Hier können zukünftig Standardwerte wie Version oder Session-Daten übernommen werden.
     *
     * @param AlexaRequest $alexaRequest Der eingehende AlexaRequest
     * @return AlexaResponse Die erzeugte Response
     */
    public function createResponse(AlexaRequest $alexaRequest): AlexaResponse
    {
        $this->logger->info('Creating new AlexaResponse based on AlexaRequest.');
// Erzeuge ein neues AlexaResponse-Objekt via Factory-Methode
        $response = AlexaResponse::create();
// Beispiel: Übertrage Session-Attribute aus dem Request in die Response
        $sessionAttributes = $alexaRequest->session?->attributes ?? [];
        $response->setSessionAttributes($sessionAttributes);
        return $response;
    }

    /**
     * Erzeugt eine Error-Response basierend auf einer Exception.
     *
     * Im Debug-Modus werden detaillierte Exception-Daten (z. B. der genaue Fehlerort und -code) in die Debug-Section
     * übernommen. Es wird stets HTTP_OK (200) zurückgegeben, da Alexa diesen Status erwartet.
     *
     * @param Throwable $exception Die Ausnahme, aus der die Fehler-Response erstellt wird.
     * @return AlexaResponse Die erzeugte Error-Response.
     */
    public function createErrorResponse(Throwable $exception): AlexaResponse
    {
        $this->logger->error('Creating error AlexaResponse. Exception: ' . $exception->getMessage());
        $response = AlexaResponse::create();
// Set status code 200 for Alexa
        $response->setStatusCode(Response::HTTP_OK);
// Generiere einen Fehler-Titel und eine detaillierte Fehlermeldung
        $errorTitle = $this->generateErrorTitle($exception);
        $errorMessage = $this->debugMode
            ? $this->generateErrorMessage($exception)
            : 'An error occurred, please try again later.';
// Übertrage die Fehlermeldung in OutputSpeech und in die Card der Response
        $response->response->outputSpeech
            ->setText($errorMessage);
        $response->response->card
            ->setType(ResponseCardType::STANDARD)
            ->setTitle($errorTitle)
            ->setText($errorMessage)
            ->setContent($errorMessage)
            ->setImage(new AlexaResponseResponseCardImage(smallImageUrl: 'https://backend.jostkleigrewe.com/build/images/wappen.png', largeImageUrl: 'https://backend.jostkleigrewe.com/build/images/wappen.png',))
        ;
// Falls im Debug-Modus, füge zusätzliche Debug-Informationen hinzu
        if ($this->debugMode) {
// Falls eine vorherige Exception vorhanden ist, ebenfalls einfügen
            if ($exception->getPrevious()) {
                $prevErrorTitle = $this->generateErrorTitle($exception->getPrevious());
                $prevErrorMessage = $this->generateErrorMessage($exception->getPrevious());
                $response->response->card
                    ->addText('Previous Error: ' . $prevErrorTitle)
                    ->addText($prevErrorMessage)
                    ->addContent($prevErrorMessage)
                ;
            }
            // Sammle Debug-Daten der Exception und setze sie in den Debug-Bereich der Response
            $debugData = $this->collectExceptionData($exception);
            $response->debug->setMessages($debugData);
        }

        // Kennzeichne, dass die Session nach der Antwort beendet wird
        $response->response->setShouldEndSession(true);
        return $response;
    }

    /**
     * Rekursive Sammlung von Exception-Daten für Debug-Zwecke.
     *
     * ACHTUNG: Diese Informationen sollten nur im Debug-Modus genutzt werden, um sensible Daten in der Produktion zu vermeiden.
     *
     * @param Throwable $throwable Die zu sammelnde Exception.
     * @return array Ein assoziatives Array mit Exception-Daten.
     */
    private function collectExceptionData(Throwable $throwable): array
    {
        $data = [
            'error'   => new ReflectionClass($throwable)->getShortName(),
            'message' => $throwable->getMessage(),
            'code'    => $throwable->getCode(),
            'file'    => $throwable->getFile(),
            'line'    => $throwable->getLine(),
        ];
// Wenn Validierungsfehler vorhanden sind (z.B. via getViolations), formatiere diese
        if (method_exists($throwable, 'getViolations')) {
            $data['violations'] = $this->formatValidationErrors($throwable->getViolations());
        }
        if ($throwable->getPrevious()) {
            $data['previous'] = $this->collectExceptionData($throwable->getPrevious());
        }
        return $data;
    }

    /**
     * Formatiert Validierungsfehler in ein Array zur Einbindung in die JSON-Ausgabe.
     *
     * @param ConstraintViolationListInterface $errors
     * @return array
     */
    private function formatValidationErrors($errors): array
    {
        $formatted = [];
        foreach ($errors as $error) {
            $formatted[] = [
                'field'        => $error->getPropertyPath(),
                'message'      => $error->getMessage(),
                'invalidValue' => $error->getInvalidValue(),
            ];
        }
        return $formatted;
    }

    /**
     * Generiert eine detaillierte Fehlermeldung auf Basis einer Exception.
     *
     * Log-Nachricht in Englisch.
     *
     * @param Throwable $throwable Die Exception, aus der die Fehlermeldung generiert wird.
     * @return string Die generierte Fehlermeldung.
     */
    protected function generateErrorMessage(Throwable $throwable): string
    {
        return sprintf('Error of type %s in file %s, line %d: %s', new ReflectionClass($throwable)->getShortName(), basename($throwable->getFile()), $throwable->getLine(), $throwable->getMessage());
    }

    /**
     * Generiert einen Fehler-Titel basierend auf dem Klassennamen der Exception.
     *
     * Log-Nachricht in Englisch.
     *
     * @param Throwable $throwable Die Exception, aus der der Titel generiert wird.
     * @return string Der generierte Fehler-Titel.
     */
    protected function generateErrorTitle(Throwable $throwable): string
    {
        return new ReflectionClass($throwable)->getShortName();
    }
}
