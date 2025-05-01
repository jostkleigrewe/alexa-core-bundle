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
        private AlexaDeviceRepository $alexaDeviceRepository,
        private EntityManagerInterface $entityManager,
        private readonly PipelineLogger $logger,
    ) {
        //
    }

    public function getAlexaDeviceByAlexaRequest(AlexaRequest $alexaRequest): AlexaDevice
    {
        $alexaDeviceId = $alexaRequest->context->system->device->deviceId;
        $session = $this->alexaDeviceRepository->findOneByDeviceId($alexaDeviceId);

        if ($session === null) {
            $session = $this->createAlexaDeviceByAlexaRequest($alexaRequest);
        }

        return $session;
    }

    public function createAlexaDeviceByAlexaRequest(AlexaRequest $alexaRequest): AlexaDevice
    {
        $this->logger->info('Create AlexaSession.');
        $alexaDeviceId = $alexaRequest->getContext()->getSystem()->getDevice()->getDeviceId();

        $device = new AlexaDevice();
        $device->setDeviceId($alexaDeviceId);

        try {
            $this->entityManager->persist($device);
            $this->entityManager->flush();
        } catch (\Throwable $e) {
            $this->logger->critical('Fehler beim Persistieren des AlexaDevice', [
                'exception' => $e,
                'sessionId' => $device->getDeviceId(),
            ]);

            $this->entityManager->clear();

            throw $e;
        }

        $this->logger->debug('AlexaDevice details.', ['device' => $device]);
        $this->logger->info('AlexaDevice created.');

        return $device;
    }
}
