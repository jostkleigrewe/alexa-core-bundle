<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for the size details in the current configuration of a viewports item.
 *
 * This DTO describes the size type and its dimensions in pixels.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\ViewportsItem
 * @license   MIT License
 */
final class AlexaRequestContextViewportsItemConfigurationCurrentSize
{
    /**
     * @param string $type        The type of the size (e.g., "DISCRETE").
     * @param int    $pixelWidth  The width of the viewport in pixels.
     * @param int    $pixelHeight The height of the viewport in pixels.
     */
    public function __construct(
        #[SerializedName('type')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public readonly string $type,

        #[SerializedName('pixelWidth')]
        #[Assert\NotNull]
        #[Assert\Type('int')]
        public readonly int $pixelWidth,

        #[SerializedName('pixelHeight')]
        #[Assert\NotNull]
        #[Assert\Type('int')]
        public readonly int $pixelHeight,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPixelWidth(): int
    {
        return $this->pixelWidth;
    }

    public function getPixelHeight(): int
    {
        return $this->pixelHeight;
    }
}
