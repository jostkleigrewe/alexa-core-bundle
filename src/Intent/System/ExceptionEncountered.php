<?php

namespace Jostkleigrewe\AlexaCoreBundle\Intent\System;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;
use PHPUnit\Event\Telemetry\System;

/**
 * Class Pause
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent\Amazon
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class ExceptionEncountered extends AbstractFallbackIntent
{
    public const array VALID_INTENTS = ['System.ExceptionEncountered'];

    public function handle(): void
    {
        $message = $this->alexaRequest->request->error?->message;
        $this->logger->error("System.ExceptionEncountered triggert", ['message' => $message]);

        $this->alexaResponse->response->clear(true);
    }
}
