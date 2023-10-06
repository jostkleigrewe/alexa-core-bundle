<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Doctrine\Common\Collections\ArrayCollection;
use Jostkleigrewe\AlexaCoreBundle\Response\Directive\DirectiveInterface;
use Symfony\Component\Serializer\Annotation;

/**
 * DTO AlexaResponseResponse
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-format
  */
class AlexaResponseResponse
{

    const SESSION_END_NULL = NULL;
    const SESSION_END_TRUE = true;
    const SESSION_END_FALSE = false;

    /**
     * The object containing the speech to render to the user.
     *
     * @var AlexaResponseResponseOutputSpeech $outputSpeech
     *
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponseResponseOutputSpeech")
     * @Annotation\SerializedName("outputSpeech")
     */
    private $outputSpeech;

    /**
     * The object containing a card to render to the Amazon Alexa App.
     *
     * @var AlexaResponseResponseCard $card
     *
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponseResponseCard")
     * @Annotation\SerializedName("card")
     */
    private $card;

    /**
     * The object containing the outputSpeech to use if a re-prompt is necessary.
     *
     * @var AlexaResponseResponseReprompt $reprompt
     *
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponseResponseReprompt")
     * @Annotation\SerializedName("reprompt")
     */
    private $reprompt;

    /**
     * A boolean value that indicates what should happen after Alexa speaks the response:
     *     true: The session ends.
     *     false: Alexa opens the microphone for a few seconds to listen for the user's response. When you use false, include a reprompt to give the user a second chance to respond.
     *     null / undefined: Behavior depends on the type of device and the content of the response.
     *
     * @var bool $shouldEndSession
     *
     * @Annotation\Type("bool")
     * @Annotation\SerializedName("shouldEndSession")
     */
    private $shouldEndSession;

    /**
     * An array of directives specifying device-level actions to take using a particular interface
     *
     * @var ArrayCollection $directives
     *
     * @Annotation\Type("ArrayCollection<Jostkleigrewe\AlexaCoreBundle\Response\Directive\BaseDirective>")
     * @Annotation\SerializedName("directives")
     */
    private $directives;

    /**
     * AlexaResponseResponse constructor.
     */
    public function __construct()
    {
        $this->outputSpeech = new AlexaResponseResponseOutputSpeech();
        $this->card = new AlexaResponseResponseCard();
        $this->reprompt = new AlexaResponseResponseReprompt();
        $this->shouldEndSession = self::SESSION_END_NULL;
        $this->directives = new ArrayCollection();
    }

    /**
     * @return AlexaResponseResponseOutputSpeech
     */
    public function getOutputSpeech(): AlexaResponseResponseOutputSpeech
    {
        return $this->outputSpeech;
    }

    /**
     * @param AlexaResponseResponseOutputSpeech $outputSpeech
     * @return self
     */
    public function setOutputSpeech(AlexaResponseResponseOutputSpeech $outputSpeech): self
    {
        $this->outputSpeech = $outputSpeech;
        return $this;
    }

    /**
     * @return AlexaResponseResponseCard
     */
    public function getCard(): AlexaResponseResponseCard
    {
        return $this->card;
    }

    /**
     * @param AlexaResponseResponseCard $card
     * @return self
     */
    public function setCard(AlexaResponseResponseCard $card): self
    {
        $this->card = $card;
        return $this;
    }

    /**
     * @return AlexaResponseResponseReprompt
     */
    public function getReprompt(): AlexaResponseResponseReprompt
    {
        return $this->reprompt;
    }

    /**
     * @param AlexaResponseResponseReprompt $reprompt
     * @return self
     */
    public function setReprompt(AlexaResponseResponseReprompt $reprompt): self
    {
        $this->reprompt = $reprompt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShouldEndSession(): bool
    {
        return $this->shouldEndSession;
    }

    /**
     * @return bool
     */
    public function getShouldEndSession(): bool
    {
        return $this->shouldEndSession;
    }

    /**
     * @param bool $shouldEndSession
     * @return self
     */
    public function setShouldEndSession(bool $shouldEndSession): self
    {
        $this->shouldEndSession = $shouldEndSession;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDirectives(): ArrayCollection
    {
        return $this->directives;
    }

    /**
     * @param DirectiveInterface $directive
     * @return self
     */
    public function addDirective(DirectiveInterface $directive): self
    {
        $this->directives->add($directive);
        return $this;
    }

    /**
     * @param DirectiveInterface $directive
     * @return self
     */
    public function removeDirective(DirectiveInterface $directive): self
    {
        $this->directives->remove($directive);
        return $this;
    }

    /**
     * @param ArrayCollection $directives
     * @return self
     */
    public function setDirectives(ArrayCollection $directives): self
    {
        $this->directives = $directives;
        return $this;
    }
}