<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the device object in the Alexa system context.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\System
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#system-object
 */
final readonly class AlexaRequestContextSystemDevice
{
    /**
     * @param string $deviceId           Unique identifier for the device.
     * @param array  $supportedInterfaces The interfaces supported by the device.
     */
    public function __construct(
        #[SerializedName('deviceId')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $deviceId,

        #[SerializedName('supportedInterfaces')]
        #[Assert\Type('array')]
        public array $supportedInterfaces,
    ) {
    }

    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    public function getSupportedInterfaces(): array
    {
        return $this->supportedInterfaces;
    }
}
