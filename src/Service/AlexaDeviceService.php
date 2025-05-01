<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaDevice;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaDeviceRepository;

/**
 * Class AlexaDeviceService
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Service
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
readonly class AlexaDeviceService
{
//    /**
//     * AlexaDeviceService constructor.
//     *
//     * @param AlexaDeviceRepository $alexaDeviceRepository
//     * @param EntityManagerInterface $entityManager
//     */
    public function __construct(
        private AlexaDeviceRepository  $alexaDeviceRepository,
        private EntityManagerInterface $entityManager
    ) {
        //
    }

    public function getAlexaDeviceByAlexaRequest(AlexaRequest $alexaRequest): AlexaDevice
    {
        $alexaDeviceId = $alexaRequest->getContext()->getSystem()->getDevice()->getDeviceId();
        $session = $this->alexaDeviceRepository->findOneByDeviceId($alexaDeviceId);

        if ($session === null) {
            $session = $this->createAlexaDeviceByAlexaRequest($alexaRequest);
        }

        return $session;
    }
//
//    /**
//     * @param AlexaRequest $alexaRequest
//     * @return AlexaDevice
//     */
    public function createAlexaDeviceByAlexaRequest(AlexaRequest $alexaRequest): AlexaDevice
    {
        $alexaDeviceId = $alexaRequest->getContext()->getSystem()->getDevice()->getDeviceId();

        $device = new AlexaDevice();
        $device->setDeviceId($alexaDeviceId);

        $this->entityManager->persist($device);
        $this->entityManager->flush();

        return $device;
    }

}
