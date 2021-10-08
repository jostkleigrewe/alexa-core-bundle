<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaUserRepository;
use Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequest;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class AlexaCoreService
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Service
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaUserService
{

    /**
     * @var AlexaUserRepository $alexaUserRepository
     */
    private $alexaUserRepository;

    /**
     * @var AlexaUser $alexaUser
     */
    private $alexaUser;

    /**
     * @var AlexaRequestService $alexaRequestService
     */
    private $alexaRequestService;

    /**
     * @var EntityManagerInterface $entityManager
     */
    private $entityManager;

    /**
     * AlexaUserService constructor.
     * @param AlexaRequestService $alexaRequestService
     * @param AlexaUserRepository $alexaUserRepository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        AlexaRequestService $alexaRequestService,
        AlexaUserRepository $alexaUserRepository,
        EntityManagerInterface $entityManager
    )
    {
        $this->alexaRequestService = $alexaRequestService;
        $this->alexaUserRepository = $alexaUserRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @return AlexaUser
     * @throws AlexaCoreException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getAlexaUser(): AlexaUser
    {
        if ($this->alexaUser === null) {
            $this->alexaUser = $this->createAlexaUserBySymfonyRequest();
        }

        return $this->alexaUser;
    }

    /**
     * create alexa-session by symfony-request
     *
     * @return AlexaUser
     * @throws AlexaCoreException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function createAlexaUserBySymfonyRequest(): AlexaUser
    {
        $alexaRequest = $this->getAlexaRequestService()->getAlexaRequest();

        return $this->getAlexaUserByAlexaRequest($alexaRequest);
    }

    /**
     * @param AlexaRequest $alexaRequest
     * @return AlexaUser
     * @throws AlexaCoreException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getAlexaUserByAlexaRequest(AlexaRequest $alexaRequest): AlexaUser
    {
        $alexaUserId = $alexaRequest->getSession()->getUser()->getUserId();
        $user = $this->getAlexaUserRepository()->findOneByAlexaId($alexaUserId);

        if ($user === null) {
            $user = $this->createAlexaUserByAlexaRequest($alexaRequest);
        }

        return $user;
    }


    /**
     * @param AlexaRequest $alexaRequest
     *
     * @return void
     * @throws AlexaCoreException
     */
    public function createAlexaUserByAlexaRequest(AlexaRequest $alexaRequest): AlexaUser
    {
        $user = new AlexaUser();

        $alexaUserId = $alexaRequest->getSession()->getUser()->getUserId();
        $user->setAlexaId($alexaUserId);

        $user->setRole('ROLE_USER');

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return $user;
    }

    /**
     * @return AlexaUserRepository
     */
    public function getAlexaUserRepository(): AlexaUserRepository
    {
        return $this->alexaUserRepository;
    }

    /**
     * @return AlexaRequestService
     */
    protected function getAlexaRequestService(): AlexaRequestService
    {
        return $this->alexaRequestService;
    }

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

}