<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the user object in an Alexa session.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#session-object
 */
final readonly class AlexaRequestSessionUser
{
    /**
     * @param string      $userId      Unique identifier for the user.
     * @param string|null $accessToken Token identifying the user in another system.
     */
    public function __construct(
        #[SerializedName('userId')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $userId,

        #[SerializedName('accessToken')]
        #[Assert\Type('string')]
        public ?string $accessToken = null,
    ) {
        // ...
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }
}
