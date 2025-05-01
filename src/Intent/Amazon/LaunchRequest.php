<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Amazon;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class LaunchRequest
 *
 * This intent is called when the skill is started.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class LaunchRequest extends AbstractFallbackIntent
{
    public const array VALID_INTENTS = [];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::handle()
     */
    public function handle(): void
    {

        $text = 'Start der Applikation';

        $this->alexaResponse->getResponse()->getOutputSpeech()->setText($text);
        $this->alexaResponse->getResponse()->getCard()->setText($text);
    }
}
