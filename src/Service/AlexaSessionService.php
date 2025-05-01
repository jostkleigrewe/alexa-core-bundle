<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

//use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\ORM\NonUniqueResultException;
//use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Doctrine\ORM\EntityManagerInterface;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionRepository;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionValueRepository;

//use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionRepository;
//use Psr\Log\LoggerInterface;

/**
 * Class AlexaSessionService
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Service
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class AlexaSessionService
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly AlexaDeviceService $alexaDeviceService,
        private readonly AlexaUserService $alexaUserService,
        private readonly AlexaSessionRepository $alexaSessionRepository,
        private readonly    AlexaSessionValueRepository $alexaSessionValueRepository,
        private readonly PipelineLogger $logger,
    ) {
        // ...
    }


    /**
     * @throws \Throwable
     */
    public function getByAlexaRequest(AlexaRequest $alexaRequest): ?AlexaSession
    {
        $alexaSessionId = $alexaRequest->getSession()?->getSessionId();
        $this->logger->info('Fetch AlexaSession', ['sessionId' => $alexaSessionId]);

        if ($alexaSessionId === null) {
            $this->logger->info('Session-Id missing in AlexaRequest');
            return null;
        }

        $session = $this->alexaSessionRepository->findOneBySessionId($alexaSessionId);
        if ($session === null) {
            $session = $this->createAlexaSessionByAlexaRequest($alexaRequest);
        }

        $this->logger->debug('AlexaSession details.', ['session' => $session]);
        $this->logger->info('AlexaSession fetched');
        return $session;
    }
//
//    /**
//     * @param AlexaRequest $alexaRequest
//     * @return AlexaSession
//     * @throws NonUniqueResultException|\Throwable
//     */
    private function createAlexaSessionByAlexaRequest(AlexaRequest $alexaRequest): AlexaSession
    {
        $this->logger->info('Create new AlexaSession.');
        $session = new AlexaSession();

        $alexaSessionId = $alexaRequest->getSession()->getSessionId();
        $session->setSessionId($alexaSessionId);

        $device = $this->alexaDeviceService->getAlexaDeviceByAlexaRequest($alexaRequest);
        $session->setAlexaDevice($device);
////
////        $user = $this->alexaUserService->getAlexaUserByAlexaRequest($alexaRequest);
////        $session->setAlexaUser($user);
//
//        $this->logger->debug(
//            message: 'createAlexaSessionByAlexaRequest',
//            context: [
//                'session' => $session,
//            ]
//        );
//
        try {
            $this->entityManager->persist($session);
            $this->entityManager->flush();
        } catch (\Throwable $e) {
            $this->logger->critical('Fehler beim Persistieren der AlexaSession', [
                'exception' => $e,
                'sessionId' => $session->getSessionId(),
            ]);

            $this->entityManager->clear();

            throw $e;
        }

        $this->logger->info('AlexaSession created.');
        return $session;
    }
}
