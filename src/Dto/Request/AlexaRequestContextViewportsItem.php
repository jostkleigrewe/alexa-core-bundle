<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for an item in the "Viewports" array of an Alexa request context.
 *
 * This DTO represents a single viewport entry as provided in the "Viewports" array.
 * It includes properties such as type, id, shape, dpi, presentationType, canRotate,
 * and its configuration.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#viewport-object
 */
final readonly class AlexaRequestContextViewportsItem
{
    /**
     * @param string $type The type of the viewport (e.g., "APL").
     * @param string $id The unique identifier for the viewport.
     * @param string $shape The shape of the viewport (e.g., "RECTANGLE", "ROUND").
     * @param int $dpi The dots per inch (DPI) of the viewport.
     * @param string $presentationType The presentation type (e.g., "STANDARD").
     * @param bool $canRotate Indicates if the viewport can rotate.
     * @param AlexaRequestContextViewportsItemConfiguration|null $configuration The configuration details of the viewport.
     */
    public function __construct(
        #[SerializedName('type')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $type,

        #[SerializedName('id')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $id,

        #[SerializedName('shape')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $shape,

        #[SerializedName('dpi')]
        #[Assert\NotNull]
        #[Assert\Type('int')]
        public int $dpi,

        #[SerializedName('presentationType')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $presentationType,

        #[SerializedName('canRotate')]
        #[Assert\Type('bool')]
        public bool $canRotate,

        #[SerializedName('configuration')]
        #[Assert\Valid]
        public ?AlexaRequestContextViewportsItemConfiguration $configuration = null,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getShape(): string
    {
        return $this->shape;
    }

    public function getDpi(): int
    {
        return $this->dpi;
    }

    public function getPresentationType(): string
    {
        return $this->presentationType;
    }

    public function isCanRotate(): bool
    {
        return $this->canRotate;
    }

    public function getConfiguration(): ?AlexaRequestContextViewportsItemConfiguration
    {
        return $this->configuration;
    }
}
