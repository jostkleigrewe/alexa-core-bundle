<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\DirectiveInterface;

/**
 * Represents the reprompt object in an Alexa response.
 *
 * This DTO represents the reprompt object as defined in the Alexa documentation.
 * It contains an outputSpeech object that Alexa will use to re-prompt the user when no response is received.
 * Optionally, it can include an array of directives specifying device-level actions (currently, only
 * the Alexa.Presentation.APLA.RenderDocument directive is supported).
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#reprompt-object
 */
final class AlexaResponseResponseReprompt
{
    /**
     * Constructor.
     *
     * @param AlexaResponseResponseOutputSpeech $outputSpeech The output speech object used to re-prompt the user.
     * @param array<DirectiveInterface>|null $directives An optional array of directives for device-level actions.
     */
    public function __construct(
        #[SerializedName('outputSpeech')]
        #[Assert\NotNull]
        #[Assert\Valid]
        public AlexaResponseResponseOutputSpeech $outputSpeech,

        #[SerializedName('directives')]
        #[Assert\Type('array')]
        #[Assert\Valid]
        public ?array $directives = null
    ) {
    }

    public static function create(): self
    {
        return new self(
            AlexaResponseResponseOutputSpeech::create(),
            []
        );
    }

    public function getOutputSpeech(): AlexaResponseResponseOutputSpeech
    {
        return $this->outputSpeech;
    }

    public function setOutputSpeech(AlexaResponseResponseOutputSpeech $outputSpeech): void
    {
        $this->outputSpeech = $outputSpeech;
    }

    public function getDirectives(): ?array
    {
        return $this->directives;
    }

    public function setDirectives(?array $directives): void
    {
        $this->directives = $directives;
    }
}
