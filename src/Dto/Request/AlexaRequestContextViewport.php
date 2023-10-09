<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaRequestContextViewport
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 * @see       AlexaRequestContextViewport::getExperiences()
 * @link      https://developer.amazon.com/de-DE/docs/alexa/alexa-presentation-language/apl-interface.html#viewport-object
 */
class AlexaRequestContextViewport
{

    public const MODE_HUB = 'HUB';
    public const MODE_MOBILE = 'MOBILE';
    public const MODE_AUTO = 'AUTO';
    public const MODE_TV = 'TV';
    public const MODE_PC = 'PC';

    public const SHAPE_RECTANGLE = 'RECTANGLE';
    public const SHAPE_ROUND = 'ROUND';

    /**
     * The mode for the device.
     *
     * @var string $mode
     * @Annotation\SerializedName("mode")
     */
    private string $mode;

    /**
     * Shape of the viewport.
     *
     * @var string $shape
     * @Annotation\SerializedName("shape")
     */
    private string $shape;

    /**
     * Width of the viewport in pixels.
     *
     * @var int $pixelWidth
     * @Annotation\SerializedName("pixelWidth")
     */
    private int $pixelWidth;

    /**
     * Height of the viewport in pixels.
     *
     * @var int $pixelHeight
     * @Annotation\SerializedName("pixelHeight")
     */
    private int $pixelHeight;

    /**
     * Pixel density of the viewport.
     *
     * @var int $dpi
     * @Annotation\SerializedName("dpi")
     */
    private int $dpi;

    /**
     * Width of the viewport in pixels that is currently in use.
     *
     * @var int $currentPixelWidth
     * @Annotation\SerializedName("currentPixelWidth")
     */
    private int $currentPixelWidth;

    /**
     * Height of the viewport in pixels that is currently in use.
     *
     * @var int $currentPixelHeight
     * @Annotation\SerializedName("currentPixelHeight")
     */
    private int $currentPixelHeight;

    /**
     * Different modes in which the customer is expected to interact with the viewport.
     *
     * @var Collection<string,AlexaRequestContextViewportExperience> $experiences
     * @Annotation\SerializedName("experiences")
     */
    private Collection $experiences;

    /**
     * Touch events that the viewport supports.
     *
     * @var string[] $touch
     * @Annotation\SerializedName("touch")
     */
    private array $touch;

    /**
     * Input mechanisms for interacting with the viewport.
     *
     * @var string[] $keyboard
     * @Annotation\SerializedName("keyboard")
     */
    private array $keyboard;

    /**
     * Specification of which technologies are available for playing video on a device
     *
     * @var AlexaRequestContextViewportVideo $video
     * @Annotation\SerializedName("video")
     */
    private AlexaRequestContextViewportVideo $video;

    /**
     * AlexaRequestContextViewport constructor.
     */
    public function __construct()
    {
        $this->experiences = new ArrayCollection();
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): AlexaRequestContextViewport
    {
        $this->mode = $mode;
        return $this;
    }

    public function getShape(): string
    {
        return $this->shape;
    }

    public function setShape(string $shape): AlexaRequestContextViewport
    {
        $this->shape = $shape;
        return $this;
    }

    public function getPixelWidth(): int
    {
        return $this->pixelWidth;
    }

    public function setPixelWidth(int $pixelWidth): AlexaRequestContextViewport
    {
        $this->pixelWidth = $pixelWidth;
        return $this;
    }

    public function getPixelHeight(): int
    {
        return $this->pixelHeight;
    }

    public function setPixelHeight(int $pixelHeight): AlexaRequestContextViewport
    {
        $this->pixelHeight = $pixelHeight;
        return $this;
    }

    public function getDpi(): int
    {
        return $this->dpi;
    }

    public function setDpi(int $dpi): AlexaRequestContextViewport
    {
        $this->dpi = $dpi;
        return $this;
    }

    public function getCurrentPixelWidth(): int
    {
        return $this->currentPixelWidth;
    }

    public function setCurrentPixelWidth(int $currentPixelWidth): AlexaRequestContextViewport
    {
        $this->currentPixelWidth = $currentPixelWidth;
        return $this;
    }

    public function getCurrentPixelHeight(): int
    {
        return $this->currentPixelHeight;
    }

    public function setCurrentPixelHeight(int $currentPixelHeight): AlexaRequestContextViewport
    {
        $this->currentPixelHeight = $currentPixelHeight;
        return $this;
    }

    public function getTouch(): array
    {
        return $this->touch;
    }

    public function setTouch(array $touch): AlexaRequestContextViewport
    {
        $this->touch = $touch;
        return $this;
    }

    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    public function setKeyboard(array $keyboard): AlexaRequestContextViewport
    {
        $this->keyboard = $keyboard;
        return $this;
    }

    public function getVideo(): AlexaRequestContextViewportVideo
    {
        return $this->video;
    }

    public function setVideo(AlexaRequestContextViewportVideo $video): AlexaRequestContextViewport
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return Collection<string,AlexaRequestContextViewportExperience>
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(AlexaRequestContextViewportExperience $experience): static
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences->add($experience);
        }
        return $this;
    }

    public function removeExperience(AlexaRequestContextViewportExperience $experience): AlexaRequestContextViewport
    {
        if ($this->experiences->contains($experience)) {
            $this->experiences->removeElement($experience);
        }
        return $this;
    }

}