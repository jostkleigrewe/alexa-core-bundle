<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\DirectiveType;
use Symfony\Component\Serializer\Annotation;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for a directive.
 *
 * Sends Alexa a command to ask the user for the value of a specific slot.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/dialog-interface-reference.html#elicitslot
 */
class ElicitSlotDirective extends AbstractDirective
{
    public function __construct(
        #[Annotation\SerializedName('slotToElicit')]
        #[Assert\Type('string')]
        public string $slotToElicit,
    ) {
        parent::__construct(DirectiveType::ELICIT_SLOT);
    }
}
