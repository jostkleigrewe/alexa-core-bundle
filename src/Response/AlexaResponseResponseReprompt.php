<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Response;

use JMS\Serializer\Annotation;

/**
 * Class AlexaResponseResponseReprompt
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Response
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-object
 */
class AlexaResponseResponseReprompt
{

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
     * AlexaResponseResponse constructor.
     */
    public function __construct()
    {
        $this->outputSpeech = new AlexaResponseResponseOutputSpeech();
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

}