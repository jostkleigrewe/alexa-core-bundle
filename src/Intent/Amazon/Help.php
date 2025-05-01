<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Amazon;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\ResponseCardType;
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
    public const array VALID_INTENTS = ['AMAZON.HelpIntent'];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function handle(): void
    {

        $text = 'Hilfe wurde aufgerufen.';

        $this->alexaResponse->getResponse()->getOutputSpeech()->setText($text);

        $this->alexaResponse->getResponse()->getCard()
            ->setType(ResponseCardType::STANDARD)
            ->setTitle('Hilfe')
            ->setText($text)
//            ->getImage()
//                ->setSmallImageUrl('https://alexa.jostkleigrewe.com/assets/j.jpg')
        ;
    }
}
