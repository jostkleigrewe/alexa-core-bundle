<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\OutputSpeechType;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Validator\Constraints as Assert;
use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\OutputSpeechPlayBehavior;

/**
 * Data Transfer Object (DTO) for Alexa output speech.
 *
 * This DTO represents the output speech object in an Alexa response. It includes the
 * type of speech (PlainText or SSML), the corresponding text or SSML content, and the
 * playBehavior attribute, which determines the queuing and playback of this output speech.
 * Valid playBehavior values are:
 * - "ENQUEUE": Add this speech to the end of the queue (default).
 * - "REPLACE_ALL": Immediately begin playback of this speech, replacing any current and enqueued speech.
 * - "REPLACE_ENQUEUED": Replace all speech in the queue with this speech without interrupting the current speech.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#outputspeech-object
 */
#[Context(normalizationContext: ['skip_null_values' => true])]
final class AlexaResponseResponseOutputSpeech
{
    public const string TEXT_DEFAULT = 'Keine Information vorhanden';

    /**
     * @param OutputSpeechType              $type         The type of the output speech ("PlainText" or "SSML").
     * @param string|null                   $text         The text to be spoken if the type is PlainText.
     * @param string|null                   $ssml         The SSML content if the type is SSML.
     * @param OutputSpeechPlayBehavior|null $playBehavior Determines the queuing and playback of this output speech.
     */
    public function __construct(
        #[SerializedName('type')]
        #[Assert\NotBlank]
        public OutputSpeechType $type = OutputSpeechType::TEXT,

        #[SerializedName('text')]
        #[Assert\Type('string')]
        public ?string $text = null,

        #[SerializedName('ssml')]
        #[Assert\Type('string')]
        public ?string $ssml = null,

        #[SerializedName('playBehavior')]
        #[Assert\NotBlank]
        public ?OutputSpeechPlayBehavior $playBehavior = null,
    ) {
    }

    /**
     * Creates a new instance of the class with the specified text.
     *
     * @param string $text The text to be used as the spoken output. Defaults to TEXT_DEFAULT.
     *
     * @return self A new instance of the class configured with the provided text.
     */
    public static function create(string $text = self::TEXT_DEFAULT): self
    {
        return new self(
            OutputSpeechType::TEXT,
            $text,
            null,
            null,
        );
    }

    /**
     * Creates an instance of the OutputSpeech with SSML content.
     *
     * @param string $ssml The SSML content to be spoken.
     *
     * @return self The instance of the class with SSML type and specified content.
     */
    public static function createSSML(string $ssml = ''): self
    {
        return new self(
            OutputSpeechType::SSML,
            null,
            $ssml,
            OutputSpeechPlayBehavior::ENQUEUE,
        );
    }

    public function getType(): OutputSpeechType
    {
        return $this->type;
    }

    public function setType(OutputSpeechType $type): AlexaResponseResponseOutputSpeech
    {
        $this->type = $type;
        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): AlexaResponseResponseOutputSpeech
    {
        $this->text = $text;
        return $this;
    }

    public function getSsml(): ?string
    {
        return $this->ssml;
    }

    public function setSsml(?string $ssml): AlexaResponseResponseOutputSpeech
    {
        $this->ssml = $ssml;
        return $this;
    }

    public function getPlayBehavior(): ?OutputSpeechPlayBehavior
    {
        return $this->playBehavior;
    }

    public function setPlayBehavior(?OutputSpeechPlayBehavior $playBehavior): AlexaResponseResponseOutputSpeech
    {
        $this->playBehavior = $playBehavior;
        return $this;
    }
}
