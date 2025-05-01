<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for Alexa debug information.
 *
 * This DTO represents the debug object in an Alexa response, which can include additional
 * diagnostic information to help with troubleshooting.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 */
final class AlexaResponseDebug
{
    /**
     * @param array<string, mixed> $info Debug information provided as key-value pairs.
     */
    public function __construct(
        #[SerializedName('info')]
        #[Assert\Type('array')]
        public array $messages = [],
    ) {
    }

    public static function create(): self
    {
        return new self([]);
    }

    public function setMessages(array $messages): AlexaResponseDebug
    {
        $this->messages = $messages;
        return $this;
    }

    /**
     * @param mixed $value
     * @param string|null $key
     * @return $this
     */
    public function addMessage(mixed $value, ?string $key = null): self
    {
        $this->messages[$key ?? microtime()] = $value;

        return $this;
    }
}
