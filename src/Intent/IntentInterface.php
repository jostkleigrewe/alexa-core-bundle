<?php
declare(strict_types = 1);

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
     * @return void
     * @throws AlexaCoreException
     *
     * @see    AbstractIntent::execute()
     */
    public function execute(): void;

    /**
     * Check, if intent-class is valid for alexa-request
     *
     * @param  AlexaRequest $alexaRequest
     * @return bool
     * @see    AbstractIntent::isValidForRequest()
     */
    public function isValidForRequest(AlexaRequest $alexaRequest): bool;

    /**
     * Check, if intent-class is valid by request-name
     *
     * @param  string $intentRequestName
     * @return bool
     * @see    AbstractIntent::isValidByName()
     */
    public function isValidByName(string $intentRequestName): bool;

    /**
     * Check, if intent-class is fallback-intent
     *
     * @return bool
     * @see    AbstractIntent::isFallback()
     */
    public function isFallback(): bool;
}