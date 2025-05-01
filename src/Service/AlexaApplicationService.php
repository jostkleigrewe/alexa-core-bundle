<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

//use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\ORM\NonUniqueResultException;
//use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Doctrine\ORM\EntityManagerInterface;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaApplication;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaApplicationRepository;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionRepository;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionValueRepository;

//use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionRepository;
//use Psr\Log\LoggerInterface;

/**
 * Class AlexaApplicationService
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Service
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class AlexaApplicationService
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly AlexaApplicationRepository $alexaApplicationRepository,
        private readonly PipelineLogger $logger,
    ) {
        // ...
    }


    /**
     * @throws \Throwable
     */
    public function getByAlexaRequest(AlexaRequest $alexaRequest): ?AlexaApplication
    {
        $alexaApplicationId = $this->getApplicationIdByAlexaRequest($alexaRequest);
        $this->logger->info('Fetch AlexaApplication', ['applicationId' => $alexaApplicationId]);

        if ($alexaApplicationId === null) {
            $this->logger->debug('Application-Id missing in AlexaRequest');
            return null;
        }

        $application = $this->alexaApplicationRepository->findOneByApplicationId($alexaApplicationId);
        if ($application === null) {
            $this->logger->debug('AlexaApplication missing in database');
            $application = $this->createAlexaApplicationByAlexaRequest($alexaRequest);
        }

        $this->logger->debug('AlexaApplication details.', ['application' => $application]);
        $this->logger->info('AlexaApplication fetched');
        return $application;
    }

    private function createAlexaApplicationByAlexaRequest(AlexaRequest $alexaRequest): AlexaApplication
    {
        $this->logger->info('Create AlexaApplication.');
        $application = new AlexaApplication();

        $alexaApplicationId = $this->getApplicationIdByAlexaRequest($alexaRequest);
        $application->setApplicationId($alexaApplicationId);

        try {
            $this->entityManager->persist($application);
            $this->entityManager->flush();
        } catch (\Throwable $e) {
            $this->logger->critical('Fehler beim Persistieren der AlexaApplication', [
                'exception' => $e,
                'applicationId' => $application->getApplicationId(),
            ]);

            $this->entityManager->clear();

            throw $e;
        }

        $this->logger->debug('AlexaApplication details.', ['application' => $application]);
        $this->logger->info('AlexaApplication created.');

        return $application;
    }

    private function getApplicationIdByAlexaRequest(AlexaRequest $alexaRequest): ?string
    {
        return
            $alexaRequest->session?->application->applicationId ??
            $alexaRequest->context->system->application->applicationId ?? null;
    }
}
