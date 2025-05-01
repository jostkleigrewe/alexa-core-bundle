<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use ArrayObject;
use OpenApi\Attributes as OA;

/**
 * Data Transfer Object (DTO) for Alexa responses.
 *
 * This DTO represents the structure of a response sent back to Alexa. It contains
 * the API version, session attributes, response details, debug information, and
 * a status code.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-format
 */
final class AlexaResponse
{
    public const string VERSION = '1.0';

    /**
     * @param string                $version            The API version of the response.
     * @param AlexaResponseResponse $response           The response details to render to the user.
     * @param ArrayObject           $sessionAttributes  Key-value pairs to persist in the session.
     * @param AlexaResponseDebug    $debug              Debug information (if applicable).
     * @param int                   $statusCode         HTTP status code for the response.
     */
    public function __construct(
        #[SerializedName('version')]
        #[Assert\NotBlank]
        public string $version,

        #[SerializedName('response')]
        #[Assert\Valid]
        public AlexaResponseResponse $response,

        #[SerializedName('sessionAttributes')]
        #[Assert\Type('object')]
        #[Context(['preserve_empty_objects' => true])]
        #[OA\Property(
            property: 'sessionAttributes',
            type: 'object',
            additionalProperties: new OA\AdditionalProperties (type: 'string')
        )]
        public ArrayObject $sessionAttributes,

        #[SerializedName('debug')]
        #[Assert\Valid]
        public AlexaResponseDebug $debug,

        #[SerializedName('statusCode')]
        #[Assert\NotNull]
        public int $statusCode = Response::HTTP_OK,
    ) {
        // ...
    }

    /**
     * Creates a default AlexaResponse with standard values.
     *
     * @return self
     */
    public static function create(): self
    {
        return new self(
            version: self::VERSION,
            response: AlexaResponseResponse::create(),
            sessionAttributes: new ArrayObject([]),
            debug: AlexaResponseDebug::create(),
            statusCode: Response::HTTP_OK,
        );
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function getResponse(): AlexaResponseResponse
    {
        return $this->response;
    }

    public function setResponse(AlexaResponseResponse $response): void
    {
        $this->response = $response;
    }

    public function getSessionAttributes(): ArrayObject
    {
        return $this->sessionAttributes;
    }

    public function setSessionAttributes(array $sessionAttributes): void
    {
        $this->sessionAttributes = new ArrayObject($sessionAttributes);
    }

    public function addSessionAttribute(string $key, string $value): self
    {
        $this->sessionAttributes[$key] = $value;
        return $this;
    }

    public function getDebug(): AlexaResponseDebug
    {
        return $this->debug;
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
}
