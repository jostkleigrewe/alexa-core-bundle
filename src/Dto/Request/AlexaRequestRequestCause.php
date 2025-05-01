<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SessionEndedRequest Parameters
 *
 * https://developer.amazon.com/de-DE/docs/alexa/custom-skills/request-types-reference.html#sessionendedrequest-parameters
 */
final class AlexaRequestRequestCause
{
    /**
     * @param string $requestId The id of the request that caused the problem
     */
    public function __construct(
        #[SerializedName('requestId')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $requestId,
    ) {
    }
}
