<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Core;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class AbstractIntent
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Intent
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */


/**
 * Class AlexaUserSetName
 * @package Jostkleigrewe\AlexaCoreBundle\Intent\Core
 */
class AlexaUserSetName extends AbstractFallbackIntent
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


        $alexaUserId = $this->alexaSession->getAlexaUser()->getAlexaId();

        $newName = $this->alexaRequest
            ->getRequest()
            ->getIntent()
            ?->getSlotByName('name')
            ->getValue();

        $alexaUser = $this->alexaSession->getAlexaUser();

        if ($alexaUser->getName() === $newName) {
            $text = 'Dein Name ist bereits ' . $newName;
        } else {
            $alexaUser->setName($newName);

            $this->em->persist($alexaUser);
            $this->em->flush();

            $text = 'Setze Namen zu: ' . $newName;
        }


        $this->alexaResponse
            ->response
            ->outputSpeech
            ->setText($text);
    }
}
