<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Core;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;

/**
 * Class AlexaUserGetName
 * @package Jostkleigrewe\AlexaCoreBundle\Intent\Core
 */
class AlexaUserGetName extends AbstractFallbackIntent
{
    public function handle(): void
    {

        //  Session?
        if ($this->alexaSession === null) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Es existiert keine Session.');
        }

        //  User?
        if ($this->alexaSession->getAlexaUser() === null) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Ich weiß leider nicht, wer du bist!');
        }

        if ($this->alexaSession->getAlexaUser()->getName()) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Benutzer bekannt und heißt ' . $this->alexaSession->getAlexaUser()->getName() . '.');
        } else {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Benutzer bekannt aber ohne Name.');
        }
    }
}
