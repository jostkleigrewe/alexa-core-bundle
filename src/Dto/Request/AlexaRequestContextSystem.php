<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the system object in the Alexa context.
 *
 * This object provides details about the device, user, application, API endpoints,
 * and additional system-related information.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#system-object
 */
final readonly class AlexaRequestContextSystem
{
    /**
     * @param AlexaRequestContextSystemApplication $application Provides application ID information.
     * @param AlexaRequestContextSystemUser        $user Provides user information.
     * @param AlexaRequestContextSystemDevice      $device Provides device information.
     * @param string                               $apiEndpoint The base URI for the Alexa APIs used by the device.
     * @param string                               $apiAccessToken The token used to access Alexa APIs.
     * @param string|null                          $apiAccessTokenExpiration The expiration time of the API access token.
     * @param AlexaRequestContextSystemUnit|null   $unit The measurement unit setting of the device (e.g., metric or imperial).
     * @param AlexaRequestContextSystemPerson|null $person Informationen zur erkannten Person.
     */
    public function __construct(
        #[SerializedName('application')]
        #[Assert\Valid]
        public AlexaRequestContextSystemApplication $application,

        #[SerializedName('user')]
        #[Assert\Valid]
        public AlexaRequestContextSystemUser $user,

        #[SerializedName('device')]
        #[Assert\Valid]
        public AlexaRequestContextSystemDevice $device,

        #[SerializedName('apiEndpoint')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $apiEndpoint,

        #[SerializedName('apiAccessToken')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $apiAccessToken,

        #[SerializedName('apiAccessTokenExpiration')]
        #[Assert\Type('string')]
        public ?string $apiAccessTokenExpiration = null,

        #[SerializedName('unit')]
        #[Assert\Valid]
        public ?AlexaRequestContextSystemUnit $unit = null,

        #[SerializedName('person')]
        #[Assert\Valid]
        public ?AlexaRequestContextSystemPerson $person = null,
    ) {
        // ...
    }
    public function getApplication(): AlexaRequestContextSystemApplication
    {
        return $this->application;
    }

    public function getUser(): AlexaRequestContextSystemUser
    {
        return $this->user;
    }

    public function getDevice(): AlexaRequestContextSystemDevice
    {
        return $this->device;
    }

    public function getApiEndpoint(): string
    {
        return $this->apiEndpoint;
    }

    public function getApiAccessToken(): string
    {
        return $this->apiAccessToken;
    }

    public function getApiAccessTokenExpiration(): ?string
    {
        return $this->apiAccessTokenExpiration;
    }

    public function getUnit(): ?AlexaRequestContextSystemUnit
    {
        return $this->unit;
    }

    public function getPerson(): ?AlexaRequestContextSystemPerson
    {
        return $this->person;
    }
}
