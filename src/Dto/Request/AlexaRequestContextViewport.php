<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaRequestContextViewport
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaRequestContextViewport
{

    /**
     * @var string $shape
     * @Annotation\SerializedName("shape")
     * @Annotation\Type("string")
     */
    private $shape;

    /**
     * @var int $pixelWidth
     * @Annotation\SerializedName("pixelWidth")
     * @Annotation\Type("int")
     */
    private $pixelWidth;

    /**
     * @var int $pixelHeight
     * @Annotation\SerializedName("pixelHeight")
     * @Annotation\Type("int")
     */
    private $pixelHeight;

    /**
     * @var int $dpi
     * @Annotation\SerializedName("dpi")
     * @Annotation\Type("int")
     */
    private $dpi;

    /**
     * @var int $currentPixelWidth
     * @Annotation\SerializedName("currentPixelWidth")
     * @Annotation\Type("int")
     */
    private $currentPixelWidth;

    /**
     * @var int $currentPixelHeight
     * @Annotation\SerializedName("currentPixelHeight")
     * @Annotation\Type("int")
     */
    private $currentPixelHeight;

    /**
     * @var ArrayCollection $experiences
     * @Annotation\SerializedName("experiences")
     * @Annotation\Type("ArrayCollection<Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestContextViewportExperience>")
     */
    private $experiences;

    /**
     * AlexaRequestContextViewport constructor.
     */
    public function __construct()
    {
        $this->experiences = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getShape(): string
    {
        return $this->shape;
    }

    /**
     * @param  string $shape
     * @return AlexaRequestContextViewport
     */
    public function setShape(string $shape): AlexaRequestContextViewport
    {
        $this->shape = $shape;
        return $this;
    }

    /**
     * @return int
     */
    public function getPixelWidth(): int
    {
        return $this->pixelWidth;
    }

    /**
     * @param  int $pixelWidth
     * @return AlexaRequestContextViewport
     */
    public function setPixelWidth(int $pixelWidth): AlexaRequestContextViewport
    {
        $this->pixelWidth = $pixelWidth;
        return $this;
    }

    /**
     * @return int
     */
    public function getPixelHeight(): int
    {
        return $this->pixelHeight;
    }

    /**
     * @param  int $pixelHeight
     * @return AlexaRequestContextViewport
     */
    public function setPixelHeight(int $pixelHeight): AlexaRequestContextViewport
    {
        $this->pixelHeight = $pixelHeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getDpi(): int
    {
        return $this->dpi;
    }

    /**
     * @param  int $dpi
     * @return AlexaRequestContextViewport
     */
    public function setDpi(int $dpi): AlexaRequestContextViewport
    {
        $this->dpi = $dpi;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPixelWidth(): int
    {
        return $this->currentPixelWidth;
    }

    /**
     * @param  int $currentPixelWidth
     * @return AlexaRequestContextViewport
     */
    public function setCurrentPixelWidth(int $currentPixelWidth): AlexaRequestContextViewport
    {
        $this->currentPixelWidth = $currentPixelWidth;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPixelHeight(): int
    {
        return $this->currentPixelHeight;
    }

    /**
     * @param  int $currentPixelHeight
     * @return AlexaRequestContextViewport
     */
    public function setCurrentPixelHeight(int $currentPixelHeight): AlexaRequestContextViewport
    {
        $this->currentPixelHeight = $currentPixelHeight;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getExperiences(): ArrayCollection
    {
        return $this->experiences;
    }

    /**
     * @param  AlexaRequestContextViewportExperience $experience
     * @return AlexaRequestContextViewport
     */
    public function addExperience(AlexaRequestContextViewportExperience $experience): AlexaRequestContextViewport
    {
        $this->experiences->add($experience);
        return $this;
    }

    /**
     * @param  AlexaRequestContextViewportExperience $experience
     * @return AlexaRequestContextViewport
     */
    public function removeExperience(AlexaRequestContextViewportExperience $experience): AlexaRequestContextViewport
    {
        $this->experiences->remove($experience);
        return $this;
    }

    /**
     * @param ArrayCollection $experiences
     * @return AlexaRequestContextViewport
     */
    public function setExperiences(ArrayCollection $experiences): AlexaRequestContextViewport
    {
        $this->experiences = $experiences;
        return $this;
    }
}