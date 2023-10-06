<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Amazon;

use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponseResponseCard;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class Help
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent\Amazon
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class Help extends AbstractFallbackIntent
{

    const VALID_INTENTS = ['AMAZON.HelpIntent'];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function createResponse() {

        $text = 'Hilfe wurde aufgerufen.';

        $this->getAlexaResponse()->getResponse()->getOutputSpeech()
            ->setText($text)
        ;

        $this->getAlexaResponse()->getResponse()->getCard()
            ->setType(AlexaResponseResponseCard::TYPE_STANDARD)
            ->setTitle('Hilfe')
            ->setText($text)
            ->getImage()
                ->setSmallImageUrl('https://alexa.jostkleigrewe.com/assets/j.jpg')
        ;

        return true;
    }

}