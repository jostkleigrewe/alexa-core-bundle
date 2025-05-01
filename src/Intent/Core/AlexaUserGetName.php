<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Core;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class AlexaUserGetName
 * @package Jostkleigrewe\AlexaCoreBundle\Intent\Core
 */
class AlexaUserGetName extends AbstractFallbackIntent
{
    /**
     * @return true
     */
    public function handle(): void
    {
        $alexaUserId = $this->alexaRequest
            ->getSession()
            ->getUser()
            ->getUserId();

        $alexaUser = $this->getManager()
            ->getAlexaUserService()
            ->getAlexaUserRepository()
            ->findOneByAlexaId($alexaUserId);

        if ($alexaUser) {
            if ($alexaUser->getName()) {
                $this->alexaResponse
                    ->getResponse()
                    ->getOutputSpeech()
                    ->setText('Benutzer bekannt und heißt ' . $alexaUser->getName() . '.');
            } else {
                $this->alexaResponse
                    ->getResponse()
                    ->getOutputSpeech()
                    ->setText('Benutzer bekannt aber ohne Name.');
            }
        } else {
            $this->alexaResponse
                ->getResponse()
                ->getOutputSpeech()
                ->setText('Ich weiß leider nicht, wer du bist!');

//            $newAlexaUser = new AlexaUser();
//            $newAlexaUser->setAlexaId($alexaUserId);
//
//            $this->entityManager->persist($newAlexaUser);
//            $this->entityManager->flush();
        }
    }


    protected function findAlexaUser()
    {
    }
}
