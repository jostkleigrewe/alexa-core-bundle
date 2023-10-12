<?php
declare(strict_types = 1);

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
 * Class AlexaUserGetName
 * @package Jostkleigrewe\AlexaCoreBundle\Intent\Core
 */
class AlexaUserGetName extends AbstractFallbackIntent
{

    /**
     * @return true
     */
    public function createResponse(): true {


        $alexaUserId = $this->getAlexaRequest()->getSession()->getUser()->getUserId();

        $alexaUser = $this->getManager()->getAlexaUserService()->getAlexaUserRepository()->findOneByAlexaId($alexaUserId);


        if ($alexaUser) {

            if ($alexaUser->getName()) {
                $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText('Benutzer bekannt und heißt ' . $alexaUser->getName() . '.');

            }
            else {
                $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText('Benutzer bekannt aber ohne Name.');

            }

        }
        else {
            $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText('Ich weiß leider nicht, wer du bist!');

//            $newAlexaUser = new AlexaUser();
//            $newAlexaUser->setAlexaId($alexaUserId);
//
//            $this->entityManager->persist($newAlexaUser);
//            $this->entityManager->flush();
        }

        return true;
    }


    protected function findAlexaUser() {

    }
}