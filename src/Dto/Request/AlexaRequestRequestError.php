<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\RequestErrorType;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SessionEndedRequest Parameters
 *
 * https://developer.amazon.com/de-DE/docs/alexa/custom-skills/request-types-reference.html#sessionendedrequest-parameters
 */
final class AlexaRequestRequestError
{
    /**
     * @param RequestErrorType $type The type of the error.
     * @param string $message The $message of the error.
     */
    public function __construct(
        #[SerializedName('type')]
        #[Assert\NotBlank]
        public readonly RequestErrorType $type,

        #[SerializedName('message')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public readonly string $message,
    ) {
    }

    public function getType(): RequestErrorType
    {
        return $this->type;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
