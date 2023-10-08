<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Manager\AlexaCoreManager;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionRepository;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionValueRepository;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AlexaSessionService
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Service
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class AlexaSessionService
{
    /**
     * @var null|AlexaSession $alexaSession
     */
    private ?AlexaSession $alexaSession;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly AlexaRequestService $alexaRequestService,
        private readonly AlexaDeviceService $alexaDeviceService,
        private readonly AlexaUserService $alexaUserService,
        private readonly AlexaSessionRepository $alexaSessionRepository,
        private readonly AlexaSessionValueRepository $alexaSessionValueRepository
    ) {
    }

    /**
     * @return AlexaSession
     * @throws AlexaCoreException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getAlexaSession(): AlexaSession
    {
        if ($this->alexaSession === null) {
            $this->alexaSession = $this->createAlexaSessionBySymfonyRequest();
        }

        return $this->alexaSession;
    }

    /**
     * create alexa-session by symfony-request
     *
     * @return AlexaSession
     * @throws AlexaCoreException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */

    public function createAlexaSessionBySymfonyRequest(): AlexaSession
    {
        $alexaRequest = $this->getAlexaRequestService()->getAlexaRequest();

        return $this->getAlexaSessionByAlexaRequest($alexaRequest);
    }

    /**
     * @param AlexaRequest $alexaRequest
     * @return AlexaSession
     * @throws AlexaCoreException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getAlexaSessionByAlexaRequest(AlexaRequest $alexaRequest): AlexaSession
    {
        $alexaSessionId = $alexaRequest->getSession()->getSessionId();
        $session = $this->getAlexaSessionRepository()->findOneBySessionId($alexaSessionId);

        if ($session === null) {
            $session = $this->createAlexaSessionByAlexaRequest($alexaRequest);
        }

        return $session;
    }

    /**
     * @param AlexaRequest $alexaRequest
     * @return AlexaSession
     * @throws AlexaCoreException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function createAlexaSessionByAlexaRequest(AlexaRequest $alexaRequest): AlexaSession
    {
        $session = new AlexaSession();

        $alexaSessionId = $alexaRequest->getSession()->getSessionId();
        $session->setSessionId($alexaSessionId);

        $device = $this->getAlexaDeviceService()->getAlexaDevice();
        $session->setAlexaDevice($device);

        $user = $this->getAlexaUserService()->getAlexaUser();
        $session->setAlexaUser($user);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return $session;
    }

    /**
     * @return AlexaSessionRepository
     */
    public function getAlexaSessionRepository(): AlexaSessionRepository
    {
        return $this->alexaSessionRepository;
    }

    /**
     * @return AlexaSessionValueRepository
     */
    public function getAlexaSessionValueRepository(): AlexaSessionValueRepository
    {
        return $this->alexaSessionValueRepository;
    }

    /**
     * @return AlexaRequestService
     */
    public function getAlexaRequestService(): AlexaRequestService
    {
        return $this->alexaRequestService;
    }

    /**
     * @return AlexaDeviceService
     */
    public function getAlexaDeviceService(): AlexaDeviceService
    {
        return $this->alexaDeviceService;
    }

    /**
     * @return AlexaUserService
     */
    public function getAlexaUserService(): AlexaUserService
    {
        return $this->alexaUserService;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }
}