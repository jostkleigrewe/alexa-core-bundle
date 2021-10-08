<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Request;

use JMS\Serializer\Annotation;

/**
 * Class AlexaRequest
 *
 * Root-object for the alexa-request
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaRequest
{

    /**
     * @var string $version
     * @Annotation\Type("string")
     * @Annotation\SerializedName("version")
     */
    private $version;

    /**
     * @var AlexaRequestSession $session
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestSession")
     * @Annotation\SerializedName("session")
     */
    private $session;

    /**
     * @var AlexaRequestContext $context
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestContext")
     * @Annotation\SerializedName("context")
     */
    private $context;

    /**
     * @var AlexaRequestRequest $request
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestRequest")
     * @Annotation\SerializedName("request")
     */
    private $request;

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param  string $version
     * @return AlexaRequest
     */
    public function setVersion(string $version): AlexaRequest
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return AlexaRequestSession
     */
    public function getSession(): AlexaRequestSession
    {
        return $this->session;
    }

    /**
     * @param  AlexaRequestSession $session
     * @return AlexaRequest
     */
    public function setSession(AlexaRequestSession $session): AlexaRequest
    {
        $this->session = $session;
        return $this;
    }

    /**
     * @return AlexaRequestContext
     */
    public function getContext(): AlexaRequestContext
    {
        return $this->context;
    }

    /**
     * @param  AlexaRequestContext $context
     * @return AlexaRequest
     */
    public function setContext(AlexaRequestContext $context): AlexaRequest
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return AlexaRequestRequest
     */
    public function getRequest(): AlexaRequestRequest
    {
        return $this->request;
    }

    /**
     * @param  AlexaRequestRequest $request
     * @return AlexaRequest
     */
    public function setRequest(AlexaRequestRequest $request): AlexaRequest
    {
        $this->request = $request;
        return $this;
    }
}