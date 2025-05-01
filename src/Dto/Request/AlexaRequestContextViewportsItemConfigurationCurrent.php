<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for the current configuration of a viewports item.
 *
 * This DTO contains properties such as the current mode, video capabilities, and size details.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\ViewportsItem
 * @license   MIT License
 */
final readonly class AlexaRequestContextViewportsItemConfigurationCurrent
{
    /**
     * @param string $mode The current mode of the viewport (e.g., "HUB").
     * @param AlexaRequestContextViewportsItemConfigurationCurrentVideo|null $video The video capabilities.
     * @param AlexaRequestContextViewportsItemConfigurationCurrentSize|null $size The size details of the viewport.
     */
    public function __construct(
        #[SerializedName('mode')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $mode,

        #[SerializedName('video')]
        #[Assert\Valid]
        public ?AlexaRequestContextViewportsItemConfigurationCurrentVideo $video = null,

        #[SerializedName('size')]
        #[Assert\Valid]
        public ?AlexaRequestContextViewportsItemConfigurationCurrentSize $size = null,
    ) {
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function getVideo(): ?AlexaRequestContextViewportsItemConfigurationCurrentVideo
    {
        return $this->video;
    }

    public function getSize(): ?AlexaRequestContextViewportsItemConfigurationCurrentSize
    {
        return $this->size;
    }
}
