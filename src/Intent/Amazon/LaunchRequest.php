<?php
declare(strict_types = 1);

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
    const VALID_INTENTS = ['VALID_INTENTS'];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function createResponse(): bool
    {

        $text = 'Start der Applikation';

        $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText($text);
        $this->getAlexaResponse()->getResponse()->getCard()->setText($text);

        return true;
    }

}