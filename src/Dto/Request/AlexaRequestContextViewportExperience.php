<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaRequestContextViewportExperience
 *
 * Manages the viewport experience settings in Alexa Request Context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 * @see       AlexaRequestContextViewport::getExperiences()
 * @link      https://developer.amazon.com/docs/alexa-skills-kit
 */
class AlexaRequestContextViewportExperience
{

    /**
    /**
     * @var int $arcMinuteWidth
     * @Annotation\SerializedName("arcMinuteWidth")
     * @Annotation\Type("int")
     */
    private $arcMinuteWidth;

    /**
     * @var int $arcMinuteHeight
     * @Annotation\SerializedName("arcMinuteHeight")
     * @Annotation\Type("int")
     */
    private $arcMinuteHeight;

    /**
     * @var bool $canRotate
     * @Annotation\SerializedName("canRotate")
     * @Annotation\Type("bool")
     */
    private $canRotate;

    /**
     * @var bool $canResize
     * @Annotation\SerializedName("canResize")
     * @Annotation\Type("bool")
     */
    private $canResize;

    /**
     * @return int
     */
    public function getArcMinuteWidth(): int
    {
        return $this->arcMinuteWidth;
    }

    /**
     * @param int $arcMinuteWidth
     * @return AlexaRequestContextViewportExperience
     */
    public function setArcMinuteWidth(int $arcMinuteWidth): AlexaRequestContextViewportExperience
    {
        $this->arcMinuteWidth = $arcMinuteWidth;
        return $this;
    }

    /**
     * @return int
     */
    public function getArcMinuteHeight(): int
    {
        return $this->arcMinuteHeight;
    }

    /**
     * @param int $arcMinuteHeight
     * @return AlexaRequestContextViewportExperience
     */
    public function setArcMinuteHeight(int $arcMinuteHeight): AlexaRequestContextViewportExperience
    {
        $this->arcMinuteHeight = $arcMinuteHeight;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCanRotate(): bool
    {
        return $this->canRotate;
    }

    /**
     * @param bool $canRotate
     * @return AlexaRequestContextViewportExperience
     */
    public function setCanRotate(bool $canRotate): AlexaRequestContextViewportExperience
    {
        $this->canRotate = $canRotate;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCanResize(): bool
    {
        return $this->canResize;
    }

    /**
     * @param bool $canResize
     * @return AlexaRequestContextViewportExperience
     */
    public function setCanResize(bool $canResize): AlexaRequestContextViewportExperience
    {
        $this->canResize = $canResize;
        return $this;
    }
}