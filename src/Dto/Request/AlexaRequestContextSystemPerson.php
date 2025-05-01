<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Repräsentiert das Person-Objekt im Alexa-Systemkontext.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\System
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/add-personalization-to-your-skill.html
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#system-object
 */
final readonly class AlexaRequestContextSystemPerson
{
    /**
     * @param string      $personId                      Eindeutige Kennung für die erkannte Person.
     * @param string|null $accessToken                   Token zur Identifizierung der Person in einem anderen System.
     * @param AlexaRequestContextSystemPersonAuthConfidence|null $authenticationConfidenceLevel Vertrauensniveau der Authentifizierung.
     */
    public function __construct(
        #[SerializedName('personId')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $personId,

        #[SerializedName('accessToken')]
        #[Assert\Type('string')]
        public ?string $accessToken = null,

        #[SerializedName('authenticationConfidenceLevel')]
        #[Assert\Valid]
        public ?AlexaRequestContextSystemPersonAuthConfidence $authenticationConfidenceLevel = null,
    ) {
    }

    public function getPersonId(): string
    {
        return $this->personId;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function getAuthenticationConfidenceLevel(): ?AlexaRequestContextSystemPersonAuthConfidence
    {
        return $this->authenticationConfidenceLevel;
    }
}
