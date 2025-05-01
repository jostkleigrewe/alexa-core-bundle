<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Core;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;

/**
 * Class AlexaApplicationGetName
 * @package Jostkleigrewe\AlexaCoreBundle\Intent\Core
 */
class AlexaApplicationGetName extends AbstractFallbackIntent
{
    public function handle(): void
    {

        //  Session?
        if ($this->alexaApplication === null) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Es existiert keine Application.');
        }

        if ($this->alexaApplication->getName()) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Application bekannt und heißt ' . $this->alexaApplication->getName() . '.');
        } else {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Application bekannt aber ohne Name.');
        }
    }
}
