<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the session object in an Alexa request.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#session-object
 */
final readonly class AlexaRequestSession
{
    /**
     * @param bool                           $new         Indicates whether the session is new.
     * @param string                         $sessionId   Unique identifier for the session.
     * @param AlexaRequestSessionApplication $application Contains the application ID.
     * @param AlexaRequestSessionUser        $user        Contains information about the user.
     * @param array<string, string>|null     $attributes  Custom attributes for the session.
     */
    public function __construct(
        #[SerializedName('new')]
        #[Assert\Type('bool')]
        public bool $new,

        #[SerializedName('sessionId')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $sessionId,

        #[SerializedName('application')]
        #[Assert\Valid]
        public AlexaRequestSessionApplication $application,

        #[SerializedName('user')]
        #[Assert\Valid]
        public AlexaRequestSessionUser $user,

        #[SerializedName('attributes')]
        #[Assert\Type('array')]
        public ?array $attributes = [],
    ) {
    }

    public function isNew(): bool
    {
        return $this->new;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getApplication(): AlexaRequestSessionApplication
    {
        return $this->application;
    }

    public function getUser(): AlexaRequestSessionUser
    {
        return $this->user;
    }

    public function getAttributes(): ?array
    {
        return $this->attributes;
    }
}
