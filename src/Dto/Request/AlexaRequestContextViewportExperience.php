<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the Experience object within the Viewport in the Alexa context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\Viewport
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#viewport-object
 */
final readonly class AlexaRequestContextViewportExperience
{
    /**
     * @param float $arcMinuteWidth  Die Breite des Viewports in Bogenminuten.
     * @param float $arcMinuteHeight Die Höhe des Viewports in Bogenminuten.
     * @param bool  $canRotate       Gibt an, ob der Bildschirm gedreht werden kann.
     * @param bool  $canResize       Gibt an, ob der Bildschirm in der Größe verändert werden kann.
     */
    public function __construct(
        #[SerializedName('arcMinuteWidth')]
        #[Assert\NotNull]
        #[Assert\Type('float')]
        public float $arcMinuteWidth,

        #[SerializedName('arcMinuteHeight')]
        #[Assert\NotNull]
        #[Assert\Type('float')]
        public float $arcMinuteHeight,

        #[SerializedName('canRotate')]
        #[Assert\NotNull]
        #[Assert\Type('bool')]
        public bool $canRotate,

        #[SerializedName('canResize')]
        #[Assert\NotNull]
        #[Assert\Type('bool')]
        public bool $canResize,
    ) {
    }

    public function getArcMinuteWidth(): float
    {
        return $this->arcMinuteWidth;
    }

    public function getArcMinuteHeight(): float
    {
        return $this->arcMinuteHeight;
    }

    public function isCanRotate(): bool
    {
        return $this->canRotate;
    }

    public function isCanResize(): bool
    {
        return $this->canResize;
    }
}
