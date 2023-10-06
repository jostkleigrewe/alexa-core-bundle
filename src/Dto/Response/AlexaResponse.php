<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\Serializer\Annotation;

/**
 * DTO AlexaResponse
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-format
 */
class AlexaResponse
{

    const VERSION = '1.0';

    /**
     * The version specifier for the response
     *
     * @var string $version
     * @Annotation\SerializedName("version")
     */
    private string $version;

    /**
     * A map of key-value pairs to persist in the session.
     *
     * @var array<string, string> $sessionAttributes
     * @Annotation\SerializedName("sessionAttributes")
     */
    private array $sessionAttributes;

    /**
     * A response object that defines what to render to the user and whether to
     * end the current session
     *
     * @var AlexaResponseResponse $response
     * @Annotation\SerializedName("response")
     */
    private AlexaResponseResponse $response;


    /**
     * A response object that defines what to render to the user and whether to end the current session
     *
     * @var AlexaResponseDebug $debug
     * @Annotation\SerializedName("debug")
     */
    private AlexaResponseDebug $debug;

    /**
     * status-code for response
     *
     * @var int $statusCode
     * @Annotation\SerializedName("statusCode")
     */
    private int $statusCode;

    /**
     * AlexaResponse constructor.
     */
//    public function __construct()
//    {
//        $this->version = self::VERSION;
//        $this->sessionAttributes = array();
//        $this->response = new AlexaResponseResponse();
//        $this->debug = new AlexaResponseDebug();
//        $this->statusCode = 200;
//    }
//

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getSessionAttributes(): array
    {
        return $this->sessionAttributes;
    }

    public function addSessionAttribute(string $key, string $value): self
    {
        $this->sessionAttributes[$key] = $value;

        return $this;
    }

    public function removeSessionAttribute(string $key): self
    {
        if (isset($this->sessionAttributes[$key])) {
            unset($this->sessionAttributes[$key]);
        }

        return $this;
    }

    public function setSessionAttributes(array $sessionAttributes): self
    {
        $this->sessionAttributes = $sessionAttributes;

        return $this;
    }

    public function getSessionAttribute(string $key): ?string
    {
        if (isset($this->sessionAttributes[$key])) {
            return $this->sessionAttributes[$key];
        }

        return null;
    }

    public function getResponse(): AlexaResponseResponse
    {
        return $this->response;
    }

    public function setResponse(AlexaResponseResponse $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getDebug(): AlexaResponseDebug
    {
        return $this->debug;
    }

    public function setDebug(AlexaResponseDebug $debug): self
    {
        $this->debug = $debug;

        return $this;
    }
}
