<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
//use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaUserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaUserRepository;

/**
 * Class AlexaCoreService
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Service
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaUserService
{
    public function __construct(
        //        private readonly AlexaRequestService $alexaRequestService,
        private readonly AlexaUserRepository $alexaUserRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly PipelineLogger $logger,
    ) {
        //
    }

    public function getAlexaUserByAlexaRequest(AlexaRequest $alexaRequest): ?AlexaUser
    {
        $alexaUserId = $alexaRequest->session?->user?->userId;
        if ($alexaUserId === null) {
            $this->logger->warning('AlexaRequest enthält keine userId.');
            return null;
        }

        $user = $this->alexaUserRepository->findOneByAlexaId($alexaUserId);
        if ($user === null) {
            $user = $this->createAlexaUserByAlexaRequest($alexaRequest);
        }

        return $user;
    }


    public function createAlexaUserByAlexaRequest(AlexaRequest $alexaRequest): ?AlexaUser
    {
        $this->logger->info('Create AlexaUser.');

        $alexaUserId = $alexaRequest->session?->user?->userId;
        if ($alexaUserId === null) {
            $this->logger->warning('AlexaRequest enthält keine userId.');
            return null;
        }

        $user = new AlexaUser();
        $user->setAlexaId($alexaUserId);
        $user->setRole('ROLE_USER');

        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (\Throwable $e) {
            $this->logger->critical('Fehler beim Persistieren der AlexaUser', [
                'exception' => $e,
                'alexaUserId' => $alexaUserId,
            ]);

            $this->entityManager->clear();

            throw $e;
        }

        $this->logger->debug('AlexaUser details.');
        $this->logger->info('Create AlexaUser.');

        return $user;
    }

//    /**
//     * @return AlexaUserRepository
//     */
//    public function getAlexaUserRepository(): AlexaUserRepository
//    {
//        return $this->alexaUserRepository;
//    }
//
//    /**
//     * @return AlexaRequestService
//     */
//    protected function getAlexaRequestService(): AlexaRequestService
//    {
//        return $this->alexaRequestService;
//    }
//
//    /**
//     * @return EntityManagerInterface
//     */
//    protected function getEntityManager(): EntityManagerInterface
//    {
//        return $this->entityManager;
//    }
}
