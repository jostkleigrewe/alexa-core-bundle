<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\Serializer\Annotation;

/**
 * DTO AlexaResponseDebug
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-format
 */
class AlexaResponseDebug
{
    /**
     * @var array<string, string> $messages
     * @Annotation\SerializedName("messages")
     */
    private array $messages;

    public function __construct()
    {
        $this->messages = [];
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function addMessage(string $value): self
    {
        $this->messages[microtime()] = $value;

        return $this;
    }
}