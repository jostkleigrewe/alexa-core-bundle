<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaUserRepository;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class AlexaCoreService
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Service
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaUserService
{
    private ?AlexaUser $alexaUser;

    public function __construct(
        private readonly AlexaRequestService $alexaRequestService,
        private readonly AlexaUserRepository $alexaUserRepository,
        private readonly EntityManagerInterface $entityManager
    )
    {
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


    public function getAlexaUserByAlexaRequest(AlexaRequest $alexaRequest): AlexaUser
    {
        $alexaUserId = $alexaRequest->getSession()->getUser()->getUserId();
        $user = $this->getAlexaUserRepository()->findOneByAlexaId($alexaUserId);

        if ($user === null) {
            $user = $this->createAlexaUserByAlexaRequest($alexaRequest);
        }

        return $user;
    }


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