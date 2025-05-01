<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\Items;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for audio directive.
 *
 * Contains an object providing information about the audio stream to play.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/audioplayer-interface-reference.html#play
 */
final class AudioItem
{
    /**
     * @param AudioItemStream           $stream     Contains an object representing the audio stream to play.
     * @param AudioItemMetadata|null    $metadata   Information about the audio displayed on the Alexa-enabled device with a screen.
     */
    public function __construct(
        #[SerializedName('stream')]
        #[Assert\Valid]
        public AudioItemStream $stream,

        #[SerializedName('metadata')]
        #[Assert\Valid]
        public ?AudioItemMetadata $metadata,
    ) {
        // ...
    }
}
