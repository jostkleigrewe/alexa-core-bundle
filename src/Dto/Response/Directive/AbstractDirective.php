<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\DirectiveType;
use Symfony\Component\Serializer\Annotation;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequestRequestIntent;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for a directive.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/dialog-interface-reference.html#directives
 */
abstract class AbstractDirective implements DirectiveInterface
{
    /**
     * An intent object. Use this to change intents during the dialog or set slot values and confirmation status.
     *
     * @var AlexaRequestRequestIntent $updatedIntent
     */
    #[Annotation\SerializedName('updatedIntent')]
    public AlexaRequestRequestIntent $updatedIntent;

    /**
     * AlexaResponse constructor.
     */
    public function __construct(
        #[SerializedName('type')]
        #[Assert\NotBlank]
        public DirectiveType $type = DirectiveType::ELICIT_SLOT,
    ) {
        // ...
    }

    public function setUpdatedIntent(AlexaRequestRequestIntent $updatedIntent): AbstractDirective
    {
        $this->updatedIntent = $updatedIntent;
        return $this;
    }

    public function getType(): DirectiveType
    {
        return $this->type;
    }
}
