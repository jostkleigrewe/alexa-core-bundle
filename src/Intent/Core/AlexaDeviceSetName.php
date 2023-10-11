<?php
declare(strict_types = 1);

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
    public function createResponse() {

        $alexaUserId = $this->getAlexaRequest()->getSession()->getUser()->getUserId();
        $alexaDeviceId = $this->getAlexaRequest()->getContext()->getSystem()->getDevice()->getDeviceId();

        $alexaUser = $this->getManager()->getAlexaUserService()->getAlexaUserRepository()->findOneByAlexaId($alexaUserId);
        $alexaDevice = $this->getManager()->getAlexaDeviceService()->getAlexaDeviceRepository()->findOneByDeviceId($alexaDeviceId);

        $newName = $this->getAlexaRequest()->getRequest()->getIntent()->getSlotByName('devicename')->getValue();

        if ($alexaDevice) {

            if ($alexaDevice->getName() === $newName) {
                $text = 'Der Name des Geräts ist bereits ' . $newName;

            }
            else {
                $alexaDevice->setName($newName);

                $this->getManager()->getEntityManager()->persist($alexaDevice);
                $this->getManager()->getEntityManager()->flush();

                $text = 'Setze Namen des Geräts zu: ' . $newName;
            }
        }
        else {
            $newAlexaDevice = new AlexaDevice();
            $newAlexaDevice->setDeviceId($alexaDeviceId);
            $newAlexaDevice->setName($newName);

            $this->getManager()->getEntityManager()->persist($newAlexaDevice);
            $this->getManager()->getEntityManager()->flush();

            $text = 'Registriere und setze Namen des Geräts zu: ' . $newName;
        }

        $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText($text);

        return true;
    }

}