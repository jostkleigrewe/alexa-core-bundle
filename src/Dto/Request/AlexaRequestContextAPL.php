<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the APL (Alexa Presentation Language) object in the Alexa context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context
 * @link      https://developer.amazon.com/en-US/docs/alexa/presentation-apl/viewport-profiles.html
 */
final readonly class AlexaRequestContextAPL
{
    /**
     * @param array $supportedInterfaces Provides supported APL interfaces.
     */
    public function __construct(
        #[SerializedName('supportedInterfaces')]
        #[Assert\Type('array')]
        public array $supportedInterfaces = [],
    ) {
    }

    public function getSupportedInterfaces(): array
    {
        return $this->supportedInterfaces;
    }
}
