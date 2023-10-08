<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaDevice;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Manager\AlexaCoreManager;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaDeviceRepository;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionRepository;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionValueRepository;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class AlexaDeviceService
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Service
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaDeviceService
{

    /**
     * @var null|AlexaDevice $alexaDevice
     */
    private ?AlexaDevice $alexaDevice = null;

    /**
     * AlexaDeviceService constructor.
     *
     * @param AlexaRequestService $alexaRequestService
     * @param AlexaDeviceRepository $alexaDeviceRepository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        private readonly AlexaRequestService $alexaRequestService,
        private readonly AlexaDeviceRepository $alexaDeviceRepository,
        private readonly EntityManagerInterface $entityManager
    )
    {
    }

    /**
     * @return AlexaDevice
     * @throws AlexaCoreException
     */
    public function getAlexaDevice(): AlexaDevice
    {
        if ($this->alexaDevice === null) {
            $this->alexaDevice = $this->createAlexaDeviceBySymfonyRequest();
        }

        return $this->alexaDevice;
    }

    /**
     * create alexa-session by symfony-request
     *
     * @return AlexaDevice
     * @throws AlexaCoreException
     */
    public function createAlexaDeviceBySymfonyRequest(): AlexaDevice
    {
        $alexaRequest = $this->getAlexaRequestService()->getAlexaRequest();

        return $this->openAlexaDeviceByAlexaRequest($alexaRequest);
    }

   /**
     * @param AlexaRequest $alexaRequest
     * @return AlexaDevice
     * @throws AlexaCoreException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function openAlexaDeviceByAlexaRequest(AlexaRequest $alexaRequest): AlexaDevice
    {
        $alexaDeviceId = $alexaRequest->getContext()->getSystem()->getDevice()->getDeviceId();
        $session = $this->getAlexaDeviceRepository()->findOneByDeviceId($alexaDeviceId);

        if ($session === null) {
            $session = $this->createAlexaDeviceByAlexaRequest($alexaRequest);
        }

        return $session;
    }

    /**
     * @param AlexaRequest $alexaRequest
     * @return AlexaDevice
     */
    public function createAlexaDeviceByAlexaRequest(AlexaRequest $alexaRequest): AlexaDevice
    {
        $alexaDeviceId = $alexaRequest->getContext()->getSystem()->getDevice()->getDeviceId();
        $device = new AlexaDevice();
        $device->setDeviceId($alexaDeviceId);

        $this->getEntityManager()->persist($device);
        $this->getEntityManager()->flush();

        return $device;
    }

    /**
     * @return AlexaRequestService
     */
    public function getAlexaRequestService(): AlexaRequestService
    {
        return $this->alexaRequestService;
    }

    /**
     * @return AlexaDeviceRepository
     */
    public function getAlexaDeviceRepository(): AlexaDeviceRepository
    {
        return $this->alexaDeviceRepository;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

}