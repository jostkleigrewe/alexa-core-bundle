<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Fallback;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;

/**
 * Class DefaultFallback
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent\Fallback
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class DefaultFallback extends AbstractFallbackIntent
{

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function createResponse(): true {

        $text = 'Fallback Intent';

        $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText($text);

        return true;
    }

}