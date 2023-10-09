<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaRequestContextViewportExperience
 *
 * Manages the viewport experience settings in Alexa Request Context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 * @see       AlexaRequestContextViewport::getExperiences()
 * @link      https://developer.amazon.com/de-DE/docs/alexa/alexa-presentation-language/apl-interface.html#video-properties
 */
class AlexaRequestContextViewportVideo
{
    public const CODEC_H264_41 = 'H_264_41';
    public const CODEC_H264_42 = 'H_264_42';

    /**
     * The video codecs that the output device supports.
     *
     * @var string[] $codecs
     * @Annotation\SerializedName("codecs")
     */
    private array $codecs;

    public function __construct()
    {
        $this->codecs = [];
    }

    /**
     * @return array|string[]
     */
    public function getCodecs(): array
    {
        return $this->codecs;
    }

    public function addCodec(string $codec): static
    {
        $this->codecs[] = $codec;
        return $this;
    }

    public function removeCodec(string $codec): static
    {
        $this->codecs = array_diff($this->codecs, [$codec]);
        return $this;
    }
}