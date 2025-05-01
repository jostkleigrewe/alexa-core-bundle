<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents a resolution authority within the resolutions object of a slot.
 *
 * This DTO includes the authority identifier, the resolution status, and optionally an array of resolved values.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @see       https://developer.amazon.com/de-DE/docs/alexa/custom-skills/request-types-reference.html#resolutions-object
 */
final readonly class AlexaRequestRequestIntentSlotResolutionsPerAuthority
{
    /**
     * @param string                                                                $authority  The identifier of the resolution authority.
     * @param AlexaRequestRequestIntentSlotResolutionsStatus                        $status     The resolution status.
     * @param array<int, AlexaRequestRequestIntentSlotResolutionValueWrapper>|null  $values     Optional array of resolution value wrappers.
     */
    public function __construct(
        #[SerializedName('authority')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $authority,

        #[SerializedName('status')]
        #[Assert\Valid]
        public AlexaRequestRequestIntentSlotResolutionsStatus $status,

        #[SerializedName('values')]
        #[Assert\Type('array')]
        #[Assert\Valid]
        public ?array $values = null
    ) {
    }

    public function getAuthority(): string
    {
        return $this->authority;
    }

    public function getStatus(): AlexaRequestRequestIntentSlotResolutionsStatus
    {
        return $this->status;
    }

    public function getValues(): ?array
    {
        return $this->values;
    }
}
