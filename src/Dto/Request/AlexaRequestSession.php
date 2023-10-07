<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;

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
     * @Annotation\SerializedName("new")
     */
    private bool $new;

    /**
     * @var string $sessionId
     * @Annotation\SerializedName("sessionId")
     */
    private string $sessionId;

    /**
     * @var AlexaRequestSessionApplication $application
     * @Annotation\SerializedName("application")
     */
    private AlexaRequestSessionApplication $application;

    /**
     * @var AlexaRequestSessionUser $user
     * @Annotation\SerializedName("user")
     */
    private AlexaRequestSessionUser $user;

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