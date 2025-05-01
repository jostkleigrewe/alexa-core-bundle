<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the video capabilities of the device in the Alexa context.
 *
 * This object describes the supported video formats and playback capabilities.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#viewport-object
 */
final class AlexaRequestContextViewportVideo
{
    public const CODEC_H264_41 = 'H_264_41';
    public const CODEC_H264_42 = 'H_264_42';

    /**
     * @param bool|null $canPlay        Indicates whether the device can play video.
     * @param bool|null $canPlayHls     Indicates whether the device supports HLS streaming.
     * @param bool|null $canPlayMp4     Indicates whether the device supports MP4 playback.
     * @param string[]  $codecs         List of supported video codecs.
     */
    public function __construct(
        #[SerializedName('canPlay')]
        #[Assert\Type('bool')]
        public readonly ?bool $canPlay = null,

        #[SerializedName('canPlayHls')]
        #[Assert\Type('bool')]
        public readonly ?bool $canPlayHls = null,

        #[SerializedName('canPlayMp4')]
        #[Assert\Type('bool')]
        public readonly ?bool $canPlayMp4 = null,

        #[SerializedName('codecs')]
        #[Assert\Type('array')]
        public readonly array $codecs = [],
    ) {
    }

    public function getCanPlay(): ?bool
    {
        return $this->canPlay;
    }

    public function getCanPlayHls(): ?bool
    {
        return $this->canPlayHls;
    }

    public function getCanPlayMp4(): ?bool
    {
        return $this->canPlayMp4;
    }

    public function getCodecs(): array
    {
        return $this->codecs;
    }
}
