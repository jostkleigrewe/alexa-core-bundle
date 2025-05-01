<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the AudioPlayer object in the Alexa context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#audioplayer-object
 */
final readonly class AlexaRequestContextAudioPlayer
{
    /**
     * @param string $token               An opaque token that represents the audio stream.
     * @param int    $offsetInMilliseconds Identifies a track's offset in milliseconds at the time of the request.
     * @param string $playerActivity      Indicates the last known state of audio playback.
     */
    public function __construct(
        #[SerializedName('token')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $token,

        #[SerializedName('offsetInMilliseconds')]
        #[Assert\NotNull]
        #[Assert\Type('int')]
        public int $offsetInMilliseconds,

        #[SerializedName('playerActivity')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $playerActivity,
    ) {
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getOffsetInMilliseconds(): int
    {
        return $this->offsetInMilliseconds;
    }

    public function getPlayerActivity(): string
    {
        return $this->playerActivity;
    }
}
