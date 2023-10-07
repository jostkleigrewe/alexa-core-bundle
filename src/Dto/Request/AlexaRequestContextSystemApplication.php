<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaRequestContextSystemApplication
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaRequestContextSystemApplication
{

    /**
     * @var string $applicationId
     * @Annotation\SerializedName("applicationId")
     */
    private string $applicationId;

    /**
     * @return string
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    /**
     * @param  string $applicationId
     * @return AlexaRequestContextSystemApplication
     */
    public function setApplicationId(string $applicationId): AlexaRequestContextSystemApplication
    {
        $this->applicationId = $applicationId;
        return $this;
    }
}