<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Jostkleigrewe\AlexaCoreBundle\Validator\Constraint\AllowedApplicationId;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the application object in the Alexa system context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\System
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#system-object
 */
final readonly class AlexaRequestContextSystemApplication
{
    /**
     * @param string $applicationId The application ID.
     */
    public function __construct(
        #[SerializedName('applicationId')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        #[AllowedApplicationId]
        public string $applicationId,
    ) {
    }

    public function getApplicationId(): string
    {
        return $this->applicationId;
    }
}
