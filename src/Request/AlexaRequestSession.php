<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Request;

use JMS\Serializer\Annotation;

/**
 * Class AlexaRequestSession
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Request
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaRequestSession
{

    /**
     * @var bool $new
     * @Annotation\Type("bool")
     * @Annotation\SerializedName("new")
     */
    private $new;

    /**
     * @var string $sessionId
     * @Annotation\Type("string")
     * @Annotation\SerializedName("sessionId")
     */
    private $sessionId;

    /**
     * @var AlexaRequestSessionApplication $application
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestSessionApplication")
     * @Annotation\SerializedName("application")
     */
    private $application;

    /**
     * @var AlexaRequestSessionUser $user
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestSessionUser")
     * @Annotation\SerializedName("user")
     */
    private $user;

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->new;
    }

    /**
     * @return bool
     */
    public function getNew(): bool
    {
        return $this->new;
    }

    /**
     * @param bool $new
     * @return AlexaRequestSession
     */
    public function setNew(bool $new): AlexaRequestSession
    {
        $this->new = $new;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return AlexaRequestSession
     */
    public function setSessionId(string $sessionId): AlexaRequestSession
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return AlexaRequestSessionApplication
     */
    public function getApplication(): AlexaRequestSessionApplication
    {
        return $this->application;
    }

    /**
     * @param AlexaRequestSessionApplication $application
     * @return AlexaRequestSession
     */
    public function setApplication(AlexaRequestSessionApplication $application): AlexaRequestSession
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @return AlexaRequestSessionUser
     */
    public function getUser(): AlexaRequestSessionUser
    {
        return $this->user;
    }

    /**
     * @param AlexaRequestSessionUser $user
     * @return AlexaRequestSession
     */
    public function setUser(AlexaRequestSessionUser $user): AlexaRequestSession
    {
        $this->user = $user;
        return $this;
    }


}