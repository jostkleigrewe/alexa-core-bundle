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
     * @var null|AlexaRequestSession $session
     * @Annotation\SerializedName("session")
     */
    private ?AlexaRequestSession $session = null;

    /**
     * The context object provides your skill with information about the current state
     *
     * @var null|AlexaRequestContext $context
     * @Annotation\SerializedName("context")
     */
    private ?AlexaRequestContext $context = null;

    /**
     * The request object provides the details of the user’s request.
     *
     * @var null|AlexaRequestRequest $request
     * @Annotation\SerializedName("request")
     */
    private ?AlexaRequestRequest $request = null;

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): AlexaRequest
    {
        $this->version = $version;
        return $this;
    }

    public function getSession(): ?AlexaRequestSession
    {
        return $this->session;
    }

    public function setSession(AlexaRequestSession $session): AlexaRequest
    {
        $this->session = $session;
        return $this;
    }

    public function getContext(): ?AlexaRequestContext
    {
        return $this->context;
    }

    public function setContext(AlexaRequestContext $context): AlexaRequest
    {
        $this->context = $context;
        return $this;
    }

    public function getRequest(): ?AlexaRequestRequest
    {
        return $this->request;
    }

    public function setRequest(AlexaRequestRequest $request): AlexaRequest
    {
        $this->request = $request;
        return $this;
    }
}