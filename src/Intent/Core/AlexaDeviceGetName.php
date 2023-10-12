<?php
declare(strict_types = 1);

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
    public function createResponse(): true {


        $alexaUserId = $this->getAlexaRequest()->getSession()->getUser()->getUserId();
        $alexaDeviceId = $this->getAlexaRequest()->getContext()->getSystem()->getDevice()->getDeviceId();

        $alexaUser = $this->getManager()->getAlexaUserService()->getAlexaUserRepository()->findOneByAlexaId($alexaUserId);
        $alexaDevice = $this->getManager()->getAlexaDeviceService()->getAlexaDeviceRepository()->findOneByDeviceId($alexaDeviceId);


        if ($alexaDevice) {

            if ($alexaDevice->getName()) {
                $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText('Gerät bekannt und heißt ' . $alexaDevice->getName() . '.');

            }
            else {
                $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText('Gerät bekannt aber ohne Name.');

            }

        }
        else {
            $this->getAlexaResponse()->getResponse()->getOutputSpeech()->setText('Das aktuelle Gerät, von dem du sprichst, ist mir leider unbekannt');

            $alexaDevice = new AlexaDevice();
            $alexaDevice->setDeviceId($alexaDeviceId);

            $this->getManager()->getEntityManager()->persist($alexaDevice);
            $this->getManager()->getEntityManager()->flush();
        }

        return true;
    }

}