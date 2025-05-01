<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\Items;

use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponseResponseCardImage;
use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\ResponseCardType;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for Alexa cards.
 *
 * This DTO represents the card object in an Alexa response. It includes the card type,
 * title, content, and optional image information.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/audioplayer-interface-reference.html#play
 */
final class AudioItemMetadata
{
    /**
     * @param string|null                   $title
     * @param string|null                   $subtitle
     * @param AudioItemMetadataVisual|null  $art
     * @param AudioItemMetadataVisual|null  $backgroundImage
     */
    public function __construct(
        #[SerializedName('title')]
        #[Assert\Type('string')]
        public ?string $title = null,

        #[SerializedName('subtitle')]
        #[Assert\Type('string')]
        public ?string $subtitle = null,

        #[SerializedName('art')]
        #[Assert\Valid]
        public ?AudioItemMetadataVisual $art = null,

        #[SerializedName('backgroundImage')]
        #[Assert\Valid]
        public ?AudioItemMetadataVisual $backgroundImage = null,
    ) {
        // ...
    }
}
