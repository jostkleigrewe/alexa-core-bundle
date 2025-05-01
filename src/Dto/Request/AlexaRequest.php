<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for handling Alexa Skill requests.
 *
 * This DTO represents the structure of an Alexa Skill request, as received
 * from the Amazon Alexa service. It includes details about the request type,
 * session information, context data, and user interactions.
 *
 * The DTO is used to deserialize and validate incoming JSON payloads
 * before processing them in the application.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License <https://opensource.org/licenses/MIT>
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html
 * @since     1.0.0
 */
final readonly class AlexaRequest
{
    /**
     * @param string                   $version The API version of the Alexa Skills Kit request.
     * @param AlexaRequestSession|null $session Information about the current user session.
     * @param AlexaRequestContext      $context Provides device-specific and system-related context.
     * @param AlexaRequestRequest      $request Contains details about the user’s interaction.
     */
    public function __construct(
        #[SerializedName('version')]
        #[Assert\NotBlank(message: 'Version of AlexaRequest cannot be empty.')]
        #[Assert\Type(type: 'string', message: 'Version of AlexaRequest must be a string.')]
        #[Assert\Choice(choices: ['1.0'], message: 'Invalid version of AlexaRequest.')]
        public string $version,

        #[SerializedName('session')]
        #[Assert\Valid]
        public ?AlexaRequestSession $session,

        #[SerializedName('context')]
        #[Assert\NotNull(message: 'Context of AlexaRequest cannot be empty.')]
        #[Assert\Valid]
        public AlexaRequestContext $context,

        #[SerializedName('request')]
        #[Assert\NotNull(message: 'Request of AlexaRequest cannot be empty.')]
        #[Assert\Valid]
        public AlexaRequestRequest $request,
    ) {
        // ...
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getSession(): ?AlexaRequestSession
    {
        return $this->session;
    }

    public function getContext(): AlexaRequestContext
    {
        return $this->context;
    }

    public function getRequest(): AlexaRequestRequest
    {
        return $this->request;
    }
}
