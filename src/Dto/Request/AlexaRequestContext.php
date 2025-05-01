<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the context object in an Alexa request.
 *
 * This class includes information about the device, API, display, audio state,
 * and additional system capabilities that are present in Alexa's request context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#context-object
 */
final readonly class AlexaRequestContext
{
    /**
     * @param AlexaRequestContextAdvertising|null   $advertising    Provides advertising-related preferences, if available.
     * @param AlexaRequestContextAPL|null           $apl            Provides details about the current APL document, if applicable.
     * @param AlexaRequestContextAudioPlayer|null   $audioPlayer    Provides the state of the AudioPlayer.
     * @param AlexaRequestContextSystem|null        $system         Provides information about the device and API.
     * @param AlexaRequestContextViewport|null      $viewport       Provides viewport characteristics for devices with displays.
     * @param AlexaRequestContextViewportsItem[]    $viewports      Provides information about multiple available viewports, if supported.
     */
    public function __construct(
        #[SerializedName('Advertising')]
        #[Assert\Valid]
        public ?AlexaRequestContextAdvertising $advertising = null,

        #[SerializedName('Alexa.Presentation.APL')]
        #[Assert\Valid]
        public ?AlexaRequestContextAPL $apl = null,

        #[SerializedName('AudioPlayer')]
        #[Assert\Valid]
        public ?AlexaRequestContextAudioPlayer $audioPlayer = null,

        #[SerializedName('System')]
        #[Assert\Valid]
        public ?AlexaRequestContextSystem $system = null,

        #[SerializedName('Viewport')]
        #[Assert\Valid]
        public ?AlexaRequestContextViewport $viewport = null,

        #[SerializedName('Viewports')]
        #[Assert\Valid]
        #[Assert\Type('array')]
        public array $viewports = [],
    ) {
    }

    public function getAdvertising(): ?AlexaRequestContextAdvertising
    {
        return $this->advertising;
    }

    public function getApl(): ?AlexaRequestContextAPL
    {
        return $this->apl;
    }

    public function getAudioPlayer(): ?AlexaRequestContextAudioPlayer
    {
        return $this->audioPlayer;
    }

    public function getSystem(): ?AlexaRequestContextSystem
    {
        return $this->system;
    }

    public function getViewport(): ?AlexaRequestContextViewport
    {
        return $this->viewport;
    }

    public function getViewports(): array
    {
        return $this->viewports;
    }
}
