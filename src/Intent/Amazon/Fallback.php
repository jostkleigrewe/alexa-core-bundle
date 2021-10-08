<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Amazon;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class Fallback
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent\Amazon
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 * @see https://docs.aws.amazon.com/lex/latest/dg/built-in-intent-fallback.html
 */
class Fallback extends AbstractFallbackIntent
{

    const VALID_INTENTS = ['AMAZON.FallbackIntent'];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function createResponse() {

        $text = 'Amazon Default Intent: Fallback';

        $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText($text);

        return true;
    }

}