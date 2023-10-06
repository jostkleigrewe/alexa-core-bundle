<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponseDebug;
use Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponseResponse;
use Symfony\Component\Serializer\Annotation;
use Symfony\Component\Serializer\Normalizer;

/**
 * Dto AlexaResponse
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-parameters
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

//    /**
//     * A map of key-value pairs to persist in the session.
//     *
//     * @var array $sessionAttributes
//     *
//     * @Annotation\SerializedName("sessionAttributes")
//     * @Annotation\Type("array<string, string>")
//     * @Annotation\XmlKeyValuePairs()
//     */
//    private array $sessionAttributes;
//
//    /**
//     * A response object that defines what to render to the user and whether to end the current session
//     *
//     * @var AlexaResponseResponse $response
//     *
//     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponseResponse")
//     * @Annotation\SerializedName("response")
//     */
//    private $response;
//
//    /**
//     * A response object that defines what to render to the user and whether to end the current session
//     *
//     * @var AlexaResponseDebug $debug
//     *
//     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponseDebug")
//     * @Annotation\SerializedName("debug")
//     */
//    private $debug;
//
//    /**
//     * status-code for response
//     *
//     * @var int $statusCode
//     */
//    private $statusCode;
//
//    /**
//     * AlexaResponse constructor.
//     */
//    public function __construct()
//    {
//        $this->version = self::VERSION;
//        $this->sessionAttributes = array();
//        $this->response = new AlexaResponseResponse();
//        $this->debug = new AlexaResponseDebug();
//        $this->statusCode = 200;
//    }
//
//    /**
//     * @return string
//     */
//    public function getVersion(): string
//    {
//        return $this->version;
//    }
//
//    /**
//     * @param string $version
//     * @return self
//     */
//    public function setVersion(string $version): self
//    {
//        $this->version = $version;
//        return $this;
//    }
//
//    /**
//     * @return array
//     */
//    public function getSessionAttributes(): array
//    {
//        return $this->sessionAttributes;
//    }
//
//    /**
//     * @return self
//     */
//    public function addSessionAttribute(string $key, string $value): self
//    {
//        $this->sessionAttributes[$key] = $value;
//
//        return $this;
//    }
//
//    /**
//     * @param string $key
//     * @return $this
//     */
//    public function removeSessionAttributes(string $key): self
//    {
//        if (isset($this->sessionAttributes[$key])) {
//            unset($this->sessionAttributes[$key]);
//        }
//
//        return $this;
//    }
//
//    /**
//     * @param array $sessionAttributes
//     * @return self
//     */
//    public function setSessionAttributes(array $sessionAttributes): self
//    {
//        $this->sessionAttributes = $sessionAttributes;
//        return $this;
//    }
//
//    /**
//     * @param string $key
//     * @return mixed|null
//     */
//    public function getSessionAttribute(string $key)
//    {
//        if (isset($this->sessionAttributes[$key])) {
//            return $this->sessionAttributes[$key];
//        }
//
//        return null;
//    }
//
//    /**
//     * @return AlexaResponseResponse
//     */
//    public function getResponse(): AlexaResponseResponse
//    {
//        return $this->response;
//    }
//
//    /**
//     * @param AlexaResponseResponse $response
//     * @return self
//     */
//    public function setResponse(AlexaResponseResponse $response): self
//    {
//        $this->response = $response;
//        return $this;
//    }
//
//    /**
//     * @return int
//     */
//    public function getStatusCode(): int
//    {
//        return $this->statusCode;
//    }
//
//    /**
//     * @param int $statusCode
//     * @return self
//     */
//    public function setStatusCode(int $statusCode): self
//    {
//        $this->statusCode = $statusCode;
//        return $this;
//    }
//
//    /**
//     * @return AlexaResponseDebug
//     */
//    public function getDebug(): AlexaResponseDebug
//    {
//        return $this->debug;
//    }
//
//    /**
//     * @param AlexaResponseDebug $debug
//     * @return $this
//     */
//    public function setDebug(AlexaResponseDebug $debug): self
//    {
//        $this->debug = $debug;
//        return $this;
//    }
//

}