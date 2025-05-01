<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\DirectiveInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for the Alexa response details.
 *
 * This DTO represents the "response" block in an Alexa response. It contains the
 * output speech, card, reprompt, directives, and the flag indicating whether the
 * session should end.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-object
 */
final class AlexaResponseResponse
{
    public const bool SESSION_END_TRUE = true;
    public const bool SESSION_END_FALSE = false;

    /**
     * @param AlexaResponseResponseOutputSpeech|null    $outputSpeech The output speech object.
     * @param AlexaResponseResponseCard|null            $card The card to be displayed.
     * @param AlexaResponseResponseReprompt|null        $reprompt The reprompt object.
     * @param array<DirectiveInterface>                 $directives An array of directives.
     * @param bool|null                                 $shouldEndSession Flag whether the session should end.
     */
    public function __construct(
        #[SerializedName('outputSpeech')]
        #[Assert\Valid]
        public ?AlexaResponseResponseOutputSpeech $outputSpeech = null,

        #[SerializedName('card')]
        #[Assert\Valid]
        public ?AlexaResponseResponseCard $card = null,

        #[SerializedName('reprompt')]
        #[Assert\Valid]
        public ?AlexaResponseResponseReprompt $reprompt = null,

        #[SerializedName('directives')]
        #[Assert\Type('array')]
        #[Assert\Valid]
        public array $directives = [],

        #[SerializedName('shouldEndSession')]
        #[Assert\Type('bool')]
        public bool $shouldEndSession = self::SESSION_END_FALSE
    ) {
    }

    public static function create(): self
    {
        return new self(
            outputSpeech: AlexaResponseResponseOutputSpeech::create(),
            card: AlexaResponseResponseCard::create(),
            reprompt: null,
            directives: [],
            shouldEndSession: self::SESSION_END_FALSE
        );
    }

    public function getOutputSpeech(): ?AlexaResponseResponseOutputSpeech
    {
        return $this->outputSpeech;
    }

    public function getCard(): ?AlexaResponseResponseCard
    {
        return $this->card;
    }

    public function getReprompt(): ?AlexaResponseResponseReprompt
    {
         return $this->reprompt;
    }

    /**
     * @return DirectiveInterface[]
     */
    public function getDirectives(): array
    {
        if (null === $this->directives) {
            $this->directives = [];
        }

        return $this->directives;
    }

    /**
     * Adds a directive to the response.
     *
     * @param DirectiveInterface $directive
     * @return self
     */
    public function addDirective(DirectiveInterface $directive): self
    {
        $this->directives[] = $directive;
        return $this;
    }

    public function getShouldEndSession(): bool
    {
        return $this->shouldEndSession;
    }

    public function setShouldEndSession(bool $shouldEndSession): self
    {
        $this->shouldEndSession = $shouldEndSession;
        return $this;
    }
}
