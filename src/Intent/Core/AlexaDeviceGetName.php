<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Core;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaDevice;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class AlexaDeviceGetName
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Intent\Core
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaDeviceGetName extends AbstractFallbackIntent
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

        //  User?
        if ($this->alexaSession->getAlexaDevice() === null) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Ich habe leider keine Informationen über das Gerät, von dem du sprichst!');
        }

        if ($this->alexaSession->getAlexaDevice()->getName()) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Gerät bekannt und heißt ' . $this->alexaSession->getAlexaUser()->getName() . '.');
        } else {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Gerät bekannt aber ohne Name.');
        }
    }
}
