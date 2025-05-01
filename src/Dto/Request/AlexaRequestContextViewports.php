<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the Viewports object in the Alexa context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context
 * @link      https://developer.amazon.com/en-US/docs/alexa/alexa-presentation-language/apl-interface.html
 */
final readonly class AlexaRequestContextViewports
{
    /**
     * @param array $viewports List of available viewports.
     */
    public function __construct(
        #[SerializedName('viewports')]
        #[Assert\Type('array')]
        public array $viewports,
    ) {
    }

    public function getViewports(): array
    {
        return $this->viewports;
    }
}
