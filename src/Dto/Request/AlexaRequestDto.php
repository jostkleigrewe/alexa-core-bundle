<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestContext;
use Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestRequest;
use Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestSession;
use Symfony\Component\Serializer\Annotation;
use Symfony\Component\Serializer\Normalizer;

/**
 * Class AlexaRequest
 *
 * Root-object for the alexa-request
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-parameters
 */
class AlexaRequestDto
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

    /**
     * @param string $version
     * @param AlexaRequestSession $session
     * @param AlexaRequestContext $context
     * @param AlexaRequestRequest $request
     */
    public function __construct(
        string $version,
        AlexaRequestSession $session,
        AlexaRequestContext $context,
        AlexaRequestRequest $request)
    {
        $this->version = $version;
        $this->session = $session;
        $this->context = $context;
        $this->request = $request;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): AlexaRequestDto
    {
        $this->version = $version;
        return $this;
    }

    public function getSession(): AlexaRequestSession
    {
        return $this->session;
    }

    public function setSession(AlexaRequestSession $session): AlexaRequestDto
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
     * @return AlexaRequestDto
     */
    public function setContext(AlexaRequestContext $context): AlexaRequestDto
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
     * @return AlexaRequestDto
     */
    public function setRequest(AlexaRequestRequest $request): AlexaRequestDto
    {
        $this->request = $request;
        return $this;
    }
}