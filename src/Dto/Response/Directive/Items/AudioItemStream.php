<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\Items;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for AudioItemStream.
 *
 * This DTO represents an audio stream item in an Alexa response. It includes the stream URL,
 * token information, offset settings, and optional caption data for audio playback.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/audioplayer-interface-reference.html#play
 */
final class AudioItemStream
{
    /**
     * @param string $url Identifies the location of audio content at a remote HTTPS location on port 443.
     * @param string $token Opaque token that identifies the audio stream. Maximum size: 1024 characters.
     * @param string|null $expectedPreviousToken Token that represents the expected previous stream. Required only when playBehavior is ENQUEUE.
     * @param int $offsetInMilliseconds The timestamp in the stream from which Alexa should begin playback.
     * @param AudioItemStreamCaptionData|null $captionData Optional caption data for the audio stream.
     */
    public function __construct(

        #[SerializedName('url')]
        #[Assert\Type('string')]
        public string $url,

        #[SerializedName('token')]
        #[Assert\Type('string')]
        public string $token,

        #[SerializedName('expectedPreviousToken')]
        #[Assert\Type('string')]
        public ?string $expectedPreviousToken = null,

        #[SerializedName('offsetInMilliseconds')]
        #[Assert\Type('integer')]
        public int $offsetInMilliseconds = 0,

        #[SerializedName('captionData')]
        #[Assert\Valid]
        public ?AudioItemStreamCaptionData $captionData = null,
    ) {
        // ...
    }
}
