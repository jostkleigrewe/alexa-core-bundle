<?php
declare(strict_types = 1);

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

    const VALID_INTENTS = ['AMAZON.StopIntent'];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function createResponse() {

        $text = 'Programm wird beendet';

        $this->getAlexaResponse()->getResponse()->getOutputSpeech()
            ->setText($text);
        $this->getAlexaResponse()->getResponse()->getCard()
            ->setTitle('Ende')
            ->setText($text);

        //  Responses to AMAZON.StopIntent must use true or null.
        $this->getAlexaResponse()->getResponse()
            ->setShouldEndSession(true);

        return true;
    }

}