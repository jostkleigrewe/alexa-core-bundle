<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\Serializer\Annotation;

/**
 * DTO AlexaResponseResponseReprompt
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 *
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-object
 */
class AlexaResponseResponseReprompt
{

    /**
     * The object containing the speech to render to the user.
     *
     * @var AlexaResponseResponseOutputSpeech $outputSpeech
     * @Annotation\SerializedName("outputSpeech")
     */
    private AlexaResponseResponseOutputSpeech $outputSpeech;

    public function __construct()
    {
        $this->outputSpeech = new AlexaResponseResponseOutputSpeech();
    }

    public function getOutputSpeech(): AlexaResponseResponseOutputSpeech
    {
        return $this->outputSpeech;
    }

    public function setOutputSpeech(AlexaResponseResponseOutputSpeech $outputSpeech): self
    {
        $this->outputSpeech = $outputSpeech;

        return $this;
    }

}