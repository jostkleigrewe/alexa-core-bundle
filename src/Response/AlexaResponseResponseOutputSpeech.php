<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Response;

use JMS\Serializer\Annotation;

/**
 * Class AlexaResponseResponseOutputSpeech
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Response
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#outputspeech-object
 */
class AlexaResponseResponseOutputSpeech
{

    const TYPE_TEXT = 'PlainText';
    const TYPE_SSML= 'SSML';
    const TEXT_DEFAULT= 'Keine Information vorhanden';

    const PLAY_BEHAVIOR_ENQUEUE = 'ENQUEUE';                        // Add this speech to the end of the queue.
    const PLAY_BEHAVIOR_REPLACE_ALL = 'REPLACE_ALL';                // Immediately begin playback of this speech
    const PLAY_BEHAVIOR_REPLACE_ENQUEUED = 'REPLACE_ENQUEUED';      // Replace all speech in the queue

    /**
     * @var string $type
     * @Annotation\Type("string")
     * @Annotation\SerializedName("type")
     */
    private $type;

    /**
     * @var string $text
     * @Annotation\Type("string")
     * @Annotation\SerializedName("text")
     */
    private $text;

    /**
     * @var string $ssml
     * @Annotation\Type("string")
     * @Annotation\SerializedName("ssml")
     */
    private $ssml;

    /**
     * A string that determines the queuing and playback of this output speech.
     *
     * @var string $playBehavior
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("playBehavior")
     * @see https://developer.amazon.com/en-US/docs/alexa/echo-button-skills/control-interruption-alexa-speech.html
     */
    private $playBehavior;

    /**
     * AlexaResponse constructor.
     */
    public function __construct()
    {
        $this->type = self::TYPE_TEXT;
        $this->text = self::TEXT_DEFAULT;
        $this->playBehavior = self::PLAY_BEHAVIOR_ENQUEUE;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return AlexaResponseResponseOutputSpeech
     */
    public function setType(string $type): AlexaResponseResponseOutputSpeech
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getSsml(): string
    {
        return $this->ssml;
    }

    /**
     * @param string $ssml
     * @return self
     */
    public function setSsml(string $ssml): self
    {
        $this->ssml = $ssml;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlayBehavior(): string
    {
        return $this->playBehavior;
    }

    /**
     * @param string $playBehavior
     * @return self
     */
    public function setPlayBehavior(string $playBehavior): self
    {
        $this->playBehavior = $playBehavior;
        return $this;
    }
}