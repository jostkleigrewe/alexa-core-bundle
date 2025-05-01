<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the user object in the Alexa system context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\System
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 */
final readonly class AlexaRequestContextSystemUser
{
    /**
     * @param string      $userId      Unique identifier for the user.
     * @param string|null $accessToken Token identifying the user in another system.
     * @param array|null  $permissions Contains the permissions granted by the user.
     */
    public function __construct(
        #[SerializedName('userId')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $userId,

        #[SerializedName('accessToken')]
        #[Assert\Type('string')]
        public ?string $accessToken = null,

        #[SerializedName('permissions')]
        #[Assert\Type('array')]
        public ?array $permissions = null,
    ) {
    }

    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}
