<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Core;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaDevice;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class AlexaDeviceSetName
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class AlexaDeviceSetName extends AbstractFallbackIntent
{
    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function handle(): void
    {

        //  Session?
        if ($this->alexaSession === null) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Es existiert keine Session.');
        }

        //  Device?
        if ($this->alexaSession->getAlexaDevice() === null) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Ich weiß leider nicht, wer du bist!');
        }

        $newName = $this->alexaRequest
            ->getRequest()
            ->getIntent()
            ?->getSlotByName('devicename')
            ->getValue();

        $alexaDevice = $this->alexaSession->getAlexaDevice();

        if ($alexaDevice->getName() === $newName) {
            $text = 'Dein Name ist bereits ' . $newName;
        } else {
            $alexaDevice->setName($newName);

            $this->em->persist($alexaDevice);
            $this->em->flush();

            $text = 'Setze Namen zu: ' . $newName;
        }

        $this->alexaResponse->response->outputSpeech->setText($text);
    }
}
