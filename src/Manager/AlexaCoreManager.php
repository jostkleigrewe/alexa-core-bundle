<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Manager;

use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaDeviceService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaRequestService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaResponseService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaSessionService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaUserService;
use Jostkleigrewe\AlexaCoreBundle\Service\IntentService;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class AlexaCoreManager
 *
 * contains all services for alexa-core-bundle
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
readonly class AlexaCoreManager
{

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly IntentService $intentService,
        private readonly AlexaUserService $alexaUserService,
        private readonly AlexaSessionService $alexaSessionService,
        private readonly AlexaRequestService $alexaRequestService,
        private readonly AlexaResponseService $alexaResponseService,
        private readonly AlexaDeviceService $alexaDeviceService
    ) {
    }

    /**
     * shortcut to fetch current alexa-request
     *
     * @return AlexaRequest
     * @throws AlexaCoreException
     */
    public function getAlexaRequest(): AlexaRequest
    {
        return $this->getAlexaRequestService()->getAlexaRequest();
    }

    /**
     * shortcut to fetch current alexa-response
     *
     * @return AlexaResponse
     * @throws AlexaCoreException
     */
    public function getAlexaResponse(): AlexaResponse
    {
        return $this->getAlexaResponseService()->getAlexaResponse();
    }

    /**
     * shortcut to fetch current alexa-session
     *
     * @return AlexaSession
     * @throws AlexaCoreException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getAlexaSession(): AlexaSession
    {
        return $this->getAlexaSessionService()->getAlexaSession();
    }

    public function getAlexaUserService(): AlexaUserService
    {
        return $this->alexaUserService;
    }

    public function getAlexaSessionService(): AlexaSessionService
    {
        return $this->alexaSessionService;
    }

    public function getAlexaDeviceService(): AlexaDeviceService
    {
        return $this->alexaDeviceService;
    }

    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    public function getIntentService(): IntentService
    {
        return $this->intentService;
    }

    public function getAlexaRequestService(): AlexaRequestService
    {
        return $this->alexaRequestService;
    }

    public function getAlexaResponseService(): AlexaResponseService
    {
        return $this->alexaResponseService;
    }
}