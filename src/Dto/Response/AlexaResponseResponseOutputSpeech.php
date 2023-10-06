<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\Serializer\Annotation;
use InvalidArgumentException;

/**
 * Class AlexaResponseResponseOutputSpeech
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 *
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#outputspeech-object
 */
class AlexaResponseResponseOutputSpeech
{

    const TYPE_TEXT = 'PlainText';
    const TYPE_SSML = 'SSML';

    const TEXT_DEFAULT = 'Keine Information vorhanden';

    const PLAY_BEHAVIOR_ENQUEUE = 'ENQUEUE';                        // Add this speech to the end of the queue.
    const PLAY_BEHAVIOR_REPLACE_ALL = 'REPLACE_ALL';                // Immediately begin playback of this speech
    const PLAY_BEHAVIOR_REPLACE_ENQUEUED = 'REPLACE_ENQUEUED';      // Replace all speech in the queue

    /**
     * @var string $type
     * @Annotation\SerializedName("type")
     */
    private string $type;

    /**
     * @var string $text
     * @Annotation\SerializedName("text")
     */
    private string $text;

    /**
     * @var string $ssml
     * @Annotation\SerializedName("ssml")
     */
    private string $ssml = '';

    /**
     * A string that determines the queuing and playback of this output speech.
     *
     * @var string $playBehavior
     * @Annotation\SerializedName("playBehavior")
     * @see https://developer.amazon.com/en-US/docs/alexa/echo-button-skills/control-interruption-alexa-speech.html
     */
    private string $playBehavior;

    public function __construct()
    {
        $this->type = self::TYPE_TEXT;
        $this->text = self::TEXT_DEFAULT;
        $this->playBehavior = self::PLAY_BEHAVIOR_ENQUEUE;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): AlexaResponseResponseOutputSpeech
    {
        if (!in_array($type, [self::TYPE_TEXT, self::TYPE_SSML], true)) {
            throw new InvalidArgumentException('Invalid type: '.$type);
        }

        $this->type = $type;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getSsml(): string
    {
        return $this->ssml;
    }

    public function setSsml(string $ssml): self
    {
        $this->ssml = $ssml;
        return $this;
    }

    public function getPlayBehavior(): string
    {
        return $this->playBehavior;
    }

    public function setPlayBehavior(string $playBehavior): self
    {
        $this->playBehavior = $playBehavior;
        return $this;
    }
}