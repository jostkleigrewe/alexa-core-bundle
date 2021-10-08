<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Manager;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaDeviceService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaRequestService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaResponseService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaSessionService;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaUserService;
use Jostkleigrewe\AlexaCoreBundle\Service\IntentService;
use Doctrine\ORM\EntityManagerInterface;
use Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponse;
use Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequest;

/**
 * Class AlexaCoreManager
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Manager
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaCoreManager
{

    /**
     * @var AlexaUserService $alexaUserService
     */
    private $alexaUserService;

    /**
     * @var AlexaDeviceService $alexaDeviceService
     */
    private $alexaDeviceService;

    /**
     * @var AlexaDeviceService $alexaSessionService
     */
    private $alexaSessionService;

    /**
     * @var AlexaRequestService $alexaRequestService
     */
    private $alexaRequestService;

    /**
     * @var AlexaResponseService $alexaResponseService
     */
    private $alexaResponseService;

    /**
     * @var IntentService $intentService
     */
    private $intentService;

    /**
     * @var EntityManagerInterface $entityManager
     */
    private $entityManager;

    /**
     * @var AlexaSession $currentSession;
     */
    private $currentSession;

    /**
     * AlexaCoreManager constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param IntentService          $intentService
     * @param AlexaUserService       $alexaUserService
     * @param AlexaSessionService    $alexaSessionService
     * @param AlexaRequestService    $alexaRequestService
     * @param AlexaResponseService   $alexaResponseService
     * @param AlexaDeviceService     $alexaDeviceService
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        IntentService $intentService,
        AlexaUserService $alexaUserService,
        AlexaSessionService $alexaSessionService,
        AlexaRequestService $alexaRequestService,
        AlexaResponseService $alexaResponseService,
        AlexaDeviceService $alexaDeviceService
    ) {
        $this->entityManager = $entityManager;
        $this->intentService = $intentService;
        $this->alexaUserService = $alexaUserService;
        $this->alexaSessionService = $alexaSessionService;
        $this->alexaRequestService = $alexaRequestService;
        $this->alexaResponseService = $alexaResponseService;
        $this->alexaDeviceService = $alexaDeviceService;
    }

    /**
     * fetch current alexa-request
     *
     * @return AlexaRequest
     * @throws AlexaCoreException
     */
    public function getAlexaRequest(): AlexaRequest
    {
        return $this->getAlexaRequestService()->getAlexaRequest();
    }

    /**
     * @return AlexaResponse
     * @throws AlexaCoreException
     */
    public function getAlexaResponse(): AlexaResponse
    {
        return $this->getAlexaResponseService()->getAlexaResponse();
    }

    /**
     * @return AlexaSession
     * @throws AlexaCoreException
     */
    public function getAlexaSession(): AlexaSession
    {
        return $this->getAlexaSessionService()->getAlexaSession();
    }








    /**
     * @return AlexaUserService
     */
    public function getAlexaUserService(): AlexaUserService
    {
        return $this->alexaUserService;
    }

    /**
     * @return AlexaSessionService
     */
    public function getAlexaSessionService(): AlexaSessionService
    {
        return $this->alexaSessionService;
    }

    /**
     * @return AlexaDeviceService
     */
    public function getAlexaDeviceService(): AlexaDeviceService
    {
        return $this->alexaDeviceService;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    /**
     * @return IntentService
     */
    public function getIntentService(): IntentService
    {
        return $this->intentService;
    }

    /**
     * @return AlexaRequestService
     */
    public function getAlexaRequestService(): AlexaRequestService
    {
        return $this->alexaRequestService;
    }

    /**
     * @return AlexaResponseService
     */
    public function getAlexaResponseService(): AlexaResponseService
    {
        return $this->alexaResponseService;
    }
}