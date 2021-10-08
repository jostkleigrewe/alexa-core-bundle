<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Request;

use JMS\Serializer\Annotation;

/**
 * Class AlexaRequestSessionUser
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Request
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaRequestSessionUser
{

    /**
     * @var string $userId
     * @Annotation\Type("string")
     * @Annotation\SerializedName("userId")
     */
    private $userId;

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return AlexaRequestSessionUser
     */
    public function setUserId(string $userId): AlexaRequestSessionUser
    {
        $this->userId = $userId;
        return $this;
    }
}