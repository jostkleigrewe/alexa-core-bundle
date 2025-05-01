<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Amazon;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\ResponseCardType;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class Cancel
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent\Amazon
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class Cancel extends AbstractFallbackIntent
{
    public const array VALID_INTENTS = ['AMAZON.CancelIntent'];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function handle(): void
    {

        $text = 'Cancel wurde aufgerufen.';

        $this->alexaResponse->getResponse()->getOutputSpeech()
            ->setText($text)
        ;

        $this->alexaResponse->getResponse()->getCard()
            ->setType(ResponseCardType::STANDARD)
            ->setTitle('Cancel')
            ->setText($text)
//            ->getImage()
//                ->setSmallImageUrl('https://alexa.jostkleigrewe.com/assets/j.jpg')
        ;
    }
}
