<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaRequestContextSystemUser
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Request
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaRequestContextSystemUser
{

    /**
     * @var string $userId
     *
     * @Annotation\SerializedName("userId")
     * @Annotation\Type("string")
     */
    private $userId;

    /**
     * @var string $accessToken
     *
     * @Annotation\SerializedName("accessToken")
     * @Annotation\Type("string")
     */
    private $accessToken;


    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return self
     */
    public function setUserId(string $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return self
     */
    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }
}