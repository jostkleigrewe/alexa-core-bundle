<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Amazon;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class Stop
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent\Amazon
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class Stop extends AbstractFallbackIntent
{
    public const array VALID_INTENTS = ['AMAZON.StopIntent'];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function handle(): void
    {

        $text = 'Applikation wird beendet';

        $this->alexaResponse->getResponse()->getOutputSpeech()->setText($text);
        $this->alexaResponse->getResponse()->getCard()->setText($text);

        //  Responses to AMAZON.StopIntent must use true or null.
        $this->alexaResponse->getResponse()
            ->setShouldEndSession(true);
    }
}
