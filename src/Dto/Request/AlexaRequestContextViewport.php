<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\ViewportMode;
use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\ViewportShape;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the Viewport object in the Alexa context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#viewport-object
 * @link      https://developer.amazon.com/en-US/docs/alexa/alexa-presentation-language/apl-viewport-property.html
 */
final readonly class AlexaRequestContextViewport
{
    /**
     * @param ViewportMode                            $mode Der Modus des Viewports (z. B. HUB, MOBILE).
     * @param ViewportShape                           $shape Die Form des Viewports (z. B. RECTANGLE, ROUND).
     * @param int                                     $pixelWidth Die Breite des Viewports in Pixeln.
     * @param int                                     $pixelHeight Die Höhe des Viewports in Pixeln.
     * @param int                                     $dpi Die Pixeldichte (DPI) des Viewports.
     * @param int                                     $currentPixelWidth Die aktuelle Breite des Viewports in Pixeln.
     * @param int                                     $currentPixelHeight Die aktuelle Höhe des Viewports in Pixeln.
     * @param string[]                                $touch Ein Array der unterstützten Touch-Eingabetypen.
     * @param string[]                                $keyboard Ein Array der unterstützten Tastatureingabetypen.
     * param AlexaRequestContextViewportVideo|null   $video Video-spezifische Eigenschaften des Viewports.
     * param AlexaRequestContextViewportExperience[] $experiences Ein Array von Experience-Objekten, die die Eigenschaften des Viewports beschreiben.
     */
    public function __construct(
        #[SerializedName('mode')]
        private ViewportMode $mode,

        #[SerializedName('shape')]
        public ViewportShape $shape,

        #[SerializedName('pixelWidth')]
        #[Assert\NotNull]
        #[Assert\Type('int')]
        public int $pixelWidth,

        #[SerializedName('pixelHeight')]
        #[Assert\NotNull]
        #[Assert\Type('int')]
        public int $pixelHeight,

        #[SerializedName('currentPixelWidth')]
        #[Assert\NotNull]
        #[Assert\Type('int')]
        public int $currentPixelWidth,

        #[SerializedName('currentPixelHeight')]
        #[Assert\NotNull]
        #[Assert\Type('int')]
        public int $currentPixelHeight,

        #[SerializedName('dpi')]
        #[Assert\NotNull]
        #[Assert\Type('int')]
        public int $dpi,

        #[SerializedName('touch')]
        #[Assert\Type('array')]
        public array $touch = [],

        #[SerializedName('keyboard')]
        #[Assert\Type('array')]
        public array $keyboard = [],

        //        #[Annotation\SerializedName('video')]
        //        #[Assert\Valid]
        //        private ?AlexaRequestContextViewportVideo $video = null,
        //
        //        #[SerializedName('experiences')]
        //        #[Assert\Valid]
        //        public array                              $experiences = [],
    ) {
    }

    public function getMode(): ViewportMode
    {
        return $this->mode;
    }

    public function getShape(): ViewportShape
    {
        return $this->shape;
    }

    public function getPixelWidth(): int
    {
        return $this->pixelWidth;
    }

    public function getPixelHeight(): int
    {
        return $this->pixelHeight;
    }

    public function getCurrentPixelWidth(): int
    {
        return $this->currentPixelWidth;
    }

    public function getCurrentPixelHeight(): int
    {
        return $this->currentPixelHeight;
    }

    public function getDpi(): int
    {
        return $this->dpi;
    }

    public function getTouch(): array
    {
        return $this->touch;
    }

    public function getKeyboard(): array
    {
        return $this->keyboard;
    }
}
