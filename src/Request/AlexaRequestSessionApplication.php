<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Request;

use JMS\Serializer\Annotation;

/**
 * Class AlexaRequestSessionApplication
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Request
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaRequestSessionApplication
{

    /**
     * @var string $applicationId
     * @Annotation\Type("string")
     * @Annotation\SerializedName("applicationId")
     */
    private $applicationId;

    /**
     * @return string
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    /**
     * @param string $applicationId
     * @return AlexaRequestSessionApplication
     */
    public function setApplicationId(string $applicationId): AlexaRequestSessionApplication
    {
        $this->applicationId = $applicationId;
        return $this;
    }
}