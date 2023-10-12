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
 * Class AlexaUserSetName
 * @package Jostkleigrewe\AlexaCoreBundle\Intent\Core
 */
class AlexaUserSetName extends AbstractFallbackIntent
{

    /**
     * @return true
     */
    public function createResponse(): true {

        $alexaUserId = $this->getAlexaRequest()->getSession()->getUser()->getUserId();
        $newName = $this->getAlexaRequest()->getRequest()->getIntent()?->getSlotByName('name')->getValue();

        $alexaUser = $this->getManager()->getAlexaUserService()->getAlexaUserRepository()->findOneByAlexaId($alexaUserId);
        if ($alexaUser) {

            if ($alexaUser->getName() === $newName) {
                $text = 'Dein Name ist bereits ' . $newName;

            }
            else {
                $alexaUser->setName($newName);

                $this->getManager()->getEntityManager()->persist($alexaUser);
                $this->getManager()->getEntityManager()->flush();

                $text = 'Setze Namen zu: ' . $newName;
            }
        }
        else {
            $newAlexaUser = new AlexaUser();
            $newAlexaUser->setAlexaId($alexaUserId);
            $newAlexaUser->setName($newName);

            $this->getManager()->getEntityManager()->persist($newAlexaUser);
            $this->getManager()->getEntityManager()->flush();

            $text = 'Setze Namen zu: ' . $newName;
        }

        $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText($text);

        return true;
    }

}