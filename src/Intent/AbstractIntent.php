<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaApplication;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
use Jostkleigrewe\AlexaCoreBundle\IntentSlot\RequiredSlot;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaApplicationService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaResponseService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaSessionService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaUserService;
use Jostkleigrewe\AlexaCoreBundle\Service\PipelineLogger;
use Psr\Log\LoggerInterface;

/**
 * Abstrakte Basisklasse für alle Alexa-Intents.
 *
 * Die implementierenden Klassen müssen die Methode handle() implementieren,
 * in der die eigentliche Logik des Intents enthalten ist.
 *
 * Die Methoden isValidForRequest und isValidByName dienen der Validierung,
 * ob ein Intent für einen bestimmten AlexaRequest in Frage kommt.
 */
abstract class AbstractIntent implements IntentInterface
{
    // Liste der als gültig definierten Intent-Namen (kann in der konkreten Klasse angepasst werden)
    public const array VALID_INTENTS = [];
    // Gibt an, ob dieser Intent als Fallback verwendet werden soll
    public const bool IS_FALLBACK = false;

    /**
     * Der aktuelle AlexaRequest, sobald er gesetzt wurde.
     */
    protected AlexaRequest $alexaRequest;

    /**
     * Die erzeugte AlexaResponse, die später zurückgegeben wird.
     */
    protected AlexaResponse $alexaResponse;

    /**
     * Die Alexa Application.
     */
    protected AlexaApplication $alexaApplication;

    /**
     * Die zugehörige AlexaSession (kann bei Bedarf verwendet werden).
     */
    protected ?AlexaSession $alexaSession = null;

    /**
     * Collection zur Verwaltung der erforderlichen Slots.
     *
     * @var Collection<string, RequiredSlot>
     */
    protected Collection $intentSlots;

    /**
     * Konstruktor.
     */
    final public function __construct(
        private readonly AlexaApplicationService    $alexaApplicationService,
        private readonly AlexaSessionService        $alexaSessionService,
        private readonly AlexaResponseService       $alexaResponseService,
        protected readonly EntityManagerInterface   $em,
        protected readonly PipelineLogger           $logger,
    ) {
        $this->intentSlots = new ArrayCollection();
    }

    /**
     * Abstrakte Methode, die in der konkreten Intent-Klasse implementiert werden muss.
     * Hier wird die eigentliche Logik des Intents verarbeitet.
     */
    abstract protected function handle(): void;

    /**
     * Führt den Intent aus und ruft die handle()-Methode auf, die die konkrete Logik umsetzt.
     */
    final public function execute(AlexaRequest $alexaRequest): AlexaResponse
    {
        $this->logger->info("Execute Intent", ['class' => static::class]);

        $this->alexaRequest     = $alexaRequest;
        $this->alexaApplication = $this->alexaApplicationService->getByAlexaRequest($alexaRequest);
        $this->alexaSession     = $this->alexaSessionService->getByAlexaRequest($alexaRequest);
        $this->alexaResponse    = $this->alexaResponseService->createResponse($alexaRequest);

        // Aufruf der implementierten Intent-Logik
        $this->handle();

        $this->logger->info("Intent executed.", ['class' => static::class]);
        return $this->alexaResponse;
    }

    /**
     * Prüft, ob dieser Intent für den Request passt.
     */
    public function isValidForRequest(AlexaRequest $alexaRequest): bool
    {
        // Extrahiere den Intent-Namen, falls vorhanden; andernfalls den Request-Typ
        $intentRequestName = $alexaRequest->request->intent?->name ?? $alexaRequest->request->type->value;

        // Hole den Kurz-Namen der aktuellen Klasse
        $className = $this->getShortClassName();
        $this->logger->debug('Validate intent', [
            'intentRequestName' => $intentRequestName,
            'className'         => $className,
            'validIntents'      => static::VALID_INTENTS
        ]);

        // Der Intent ist gültig, wenn der Name in der konstanten Liste steht oder
        // der Klassenname exakt dem übergebenen Namen entspricht.
        return (
            in_array($intentRequestName, static::VALID_INTENTS) ||
            $className === $intentRequestName
        );
    }

    /**
     * Gibt zurück, ob dieser Intent als Fallback verwendet werden soll.
     */
    public function isFallback(): bool
    {
        return static::IS_FALLBACK;
    }

    /**
     * Liefert den Kurz-Namen der aktuellen Klasse zurück.
     */
    protected function getShortClassName(): string
    {
        return substr(static::class, strrpos(static::class, '\\') + 1);
    }
}
