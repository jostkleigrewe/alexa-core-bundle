<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent;

use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;

/**
 * Interface IntentInterface
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
interface IntentInterface
{
    /**
     * @param AlexaRequest $alexaRequest
     * @return AlexaResponse
     */
    /**
     * Führt den Intent aus und gibt eine AlexaResponse zurück.
     *
     * @throws AlexaCoreException
     */
    public function execute(AlexaRequest $alexaRequest): AlexaResponse;


    /**
     * Check, if intent-class is valid by request-name
     *
     * Verwendung: Nur für Requests des Typs „IntentRequest“.
     *
     * Beispiel-Request (vereinfacht):
     * {
     * "request": {
     * "type": "IntentRequest",
     * "intent": {
     * "name": "AlexaUserGetName"
     * }
     * }
     * }
     * oder
     * Beispiel-Request (vereinfacht):
     * {
     * "request": {
     * "type": "LaunchRequest"
     * }
     * }
     *
     * @param  AlexaRequest $alexaRequest
     * @return bool
     * @see    AbstractIntent::isValidForRequest()
     */
    public function isValidForRequest(AlexaRequest $alexaRequest): bool;

    /**
     * Check, if intent-class is fallback-intent
     *
     * @return bool
     * @see    AbstractIntent::isFallback()
     */
    public function isFallback(): bool;
}
