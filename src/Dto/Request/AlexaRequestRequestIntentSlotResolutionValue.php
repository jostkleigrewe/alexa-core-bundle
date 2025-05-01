<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the resolution value for a slot.
 *
 * This DTO contains the resolved name and optionally an ID for the slot value.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#slot-object
 */
final readonly class AlexaRequestRequestIntentSlotResolutionValue
{
    /**
     * @param string $name The resolved name for the slot.
     * @param string|null $id The resolved ID for the slot value.
     */
    public function __construct(
        #[SerializedName('name')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $name,
        #[SerializedName('id')]
        #[Assert\Type('string')]
        public ?string $id = null
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}
