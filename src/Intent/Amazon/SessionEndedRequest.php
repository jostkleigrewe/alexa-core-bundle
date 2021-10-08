<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Amazon;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class SessionEndedRequest
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class SessionEndedRequest extends AbstractFallbackIntent
{

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function createResponse()
    {
        $text = 'Tschüss.';

        $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText($text);

        return true;
    }

}