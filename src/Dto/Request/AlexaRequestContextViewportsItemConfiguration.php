<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for the configuration of a viewports item.
 *
 * This DTO encapsulates the configuration details for a viewport entry,
 * currently containing the "current" configuration.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\ViewportsItem
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 */
final readonly class AlexaRequestContextViewportsItemConfiguration
{
    /**
     * @param AlexaRequestContextViewportsItemConfigurationCurrent|null $current The current configuration of the viewport.
     */
    public function __construct(
        #[SerializedName('current')]
        #[Assert\Valid]
        public ?AlexaRequestContextViewportsItemConfigurationCurrent $current = null,
    ) {
    }

    public function getCurrent(): ?AlexaRequestContextViewportsItemConfigurationCurrent
    {
        return $this->current;
    }
}
