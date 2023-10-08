<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaDeviceRepository;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaRequestResponseLogRepository;

/**
 * Class AlexaLogService
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Service
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaLogService
{
    /**
     * AlexaUserService constructor.
     * @param AlexaRequestResponseLogRepository $logRepository
     */
    public function __construct(
        private readonly AlexaRequestResponseLogRepository $logRepository)
    {
    }

    /**
     * @return AlexaRequestResponseLogRepository
     */
    public function getLogRepository(): AlexaRequestResponseLogRepository
    {
        return $this->logRepository;
    }

}