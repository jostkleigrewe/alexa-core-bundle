<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the status object within slot resolutions.
 *
 * This DTO provides the resolution status code which indicates whether a match was found.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#slot-object
 */
final readonly class AlexaRequestRequestIntentSlotResolutionsStatus
{
    /**
     * @param string $code  The resolution status code.
     *                      Typical values include "ER_SUCCESS_MATCH" and "ER_SUCCESS_NO_MATCH".
     */
    public function __construct(
        #[SerializedName('code')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $code
    ) {
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
