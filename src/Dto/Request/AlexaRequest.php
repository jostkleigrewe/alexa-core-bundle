<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;

/**
 * Dto AlexaRequest
 *
 * DTO for JSON-Request of the Alexa Skill
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-parameters
 */
class AlexaRequest
{

    /**
     * The version specifier for the request
     *
     * @var string $version
     * @Annotation\SerializedName("version")
     */
    private string $version;

    /**
     * The session object provides additional context associated with the request.
     *
     * @var AlexaRequestSession $session
     * @Annotation\SerializedName("session")
     */
    private AlexaRequestSession $session;

    /**
     * The context object provides your skill with information about the current state
     *
     * @var AlexaRequestContext $context
     * @Annotation\SerializedName("context")
     */
    private AlexaRequestContext $context;

    /**
     * The request object provides the details of the user’s request.
     *
     * @var AlexaRequestRequest $request
     * @Annotation\SerializedName("request")
     */
    private AlexaRequestRequest $request;

    public function __construct()
    {
        $this->session = new AlexaRequestSession();
        $this->context = new AlexaRequestContext();
        $this->request = new AlexaRequestRequest();
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): AlexaRequest
    {
        $this->version = $version;
        return $this;
    }

    public function getSession(): AlexaRequestSession
    {
        return $this->session;
    }

    public function setSession(AlexaRequestSession $session): AlexaRequest
    {
        $this->session = $session;
        return $this;
    }

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