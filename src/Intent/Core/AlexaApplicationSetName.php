<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Core;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaDevice;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class AlexaApplicationSetName
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class AlexaApplicationSetName extends AbstractFallbackIntent
{
    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function handle(): void
    {

        //  Session?
        if ($this->alexaApplication === null) {
            $this->alexaResponse->response
                ->outputSpeech
                ->setText('Es existiert keine Application.');
        }

        $newName = $this->alexaRequest
            ->getRequest()
            ->getIntent()
            ?->getSlotByName('appname')
            ->getValue();

        $alexaApplication = $this->alexaApplication;

        if ($alexaApplication->getName() === $newName) {
            $text = 'Der Name der Applikation Name ist bereits ' . $newName;
        } else {
            $alexaApplication->setName($newName);

            $this->em->persist($alexaApplication);
            $this->em->flush();

            $text = 'Setze Namen zu: ' . $newName;
        }

        $this->alexaResponse->response->outputSpeech->setText($text);
    }
}
