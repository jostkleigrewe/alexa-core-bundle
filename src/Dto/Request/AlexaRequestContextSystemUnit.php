<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the unit object in the Alexa system.
 *
 * - unitId: Unique identifier for the unit (variable length).
 * - persistentUnitId: Vendor-specific identifier (max. 255 characters).
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#system-object
 */
final readonly class AlexaRequestContextSystemUnit
{
    /**
     * @param string|null $unitId           Unique identifier for the unit.
     * @param string|null $persistentUnitId Vendor-specific identifier (max. 255 characters).
     */
    public function __construct(
        #[SerializedName('unitId')]
        #[Assert\Type('string')]
        public ?string $unitId = null,

        #[SerializedName('persistentUnitId')]
        #[Assert\Type('string')]
        #[Assert\Length(max: 255)]
        public ?string $persistentUnitId = null,
    ) {
    }

    public function getUnitId(): ?string
    {
        return $this->unitId;
    }

    public function getPersistentUnitId(): ?string
    {
        return $this->persistentUnitId;
    }
}
