<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents a resolution value wrapper for a slot.
 *
 * This DTO wraps a resolution value, which contains the resolved name and optionally an ID.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#slot-object
 */
final readonly class AlexaRequestRequestIntentSlotResolutionValueWrapper
{
    /**
     * @param AlexaRequestRequestIntentSlotResolutionValue $value The resolved value.
     */
    public function __construct(
        #[SerializedName('value')]
        #[Assert\Valid]
        public AlexaRequestRequestIntentSlotResolutionValue $value
    ) {
    }

    public function getValue(): AlexaRequestRequestIntentSlotResolutionValue
    {
        return $this->value;
    }
}
