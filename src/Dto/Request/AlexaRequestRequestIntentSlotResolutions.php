<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the resolutions object for a slot in an Alexa request.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/de-DE/docs/alexa/custom-skills/request-types-reference.html#slot-object
 */
readonly class AlexaRequestRequestIntentSlotResolutions
{
    /**
     * @param array<int, AlexaRequestRequestIntentSlotResolutionsPerAuthority> $resolutionsPerAuthority An array of resolution authorities.
     */
    public function __construct(
        #[SerializedName('resolutionsPerAuthority')]
        #[Assert\Type('array')]
        #[Assert\Valid]
        public array $resolutionsPerAuthority = []
    ) {
    }

    public function getResolutionsPerAuthority(): array
    {
        return $this->resolutionsPerAuthority;
    }
}
