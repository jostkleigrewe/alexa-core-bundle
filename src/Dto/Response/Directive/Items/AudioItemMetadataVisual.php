<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\Items;

use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponseResponseCardImage;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\DirectiveInterface;
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
final class AudioItemMetadataVisual
{
    /**
     * @param AudioItemMetadataVisualUrl[] $sources
     */
    public function __construct(
        #[SerializedName('sources')]
        #[Assert\Type('array')]
        #[Assert\Valid]
        public array $sources = [],
    ) {
        // ...
    }

    public static function create(string $url): self
    {
        return new self([new AudioItemMetadataVisualUrl($url)]);
    }
}
