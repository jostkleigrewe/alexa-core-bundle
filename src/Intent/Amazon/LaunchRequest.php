<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Amazon;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class LaunchRequest
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class LaunchRequest extends AbstractFallbackIntent
{

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function createResponse() {

        $text = 'Start der Applikation';

        $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText($text);
        $this->getAlexaResponse()->getResponse()->getCard()->setText($text);

        return true;
    }

}