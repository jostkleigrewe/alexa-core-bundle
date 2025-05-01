<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\DirectiveType;
use Symfony\Component\Serializer\Annotation;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequestRequestIntent;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class BaseDirective
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Response\Directive
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-parameters
 */
abstract class BaseDirective implements DirectiveInterface
{
    /**
     * An intent object. Use this to change intents during the dialog or set slot values and confirmation status.
     *
     * @var AlexaRequestRequestIntent $updatedIntent
     */
    #[Annotation\SerializedName('updatedIntent')]
    private AlexaRequestRequestIntent $updatedIntent;

    /**
     * The name of the slot to confirm.
     *
     * @var string $slotToConfirm|null
     */
    #[Annotation\SerializedName('slotToConfirm')]
    private string $slotToConfirm;

    /**
     * The name of the slot to elicit.
     *
     * @var string $slotToElicit|null
     */
    #[Annotation\SerializedName('slotToElicit')]
    private string $slotToElicit;

    /**
     * AlexaResponse constructor.
     */
    public function __construct(
        #[SerializedName('type')]
        #[Assert\NotBlank]
        private DirectiveType $type = DirectiveType::ELICIT_SLOT,
    ) {
        //
    }

    /**
     * @return DirectiveType
     */
    public function getType(): DirectiveType
    {
        return $this->type;
    }

    /**
     * @return AlexaRequestRequestIntent|null
     */
    public function getUpdatedIntent(): ?AlexaRequestRequestIntent
    {
        return $this->updatedIntent;
    }

    /**
     * @param AlexaRequestRequestIntent $intent
     * @return self
     */
    public function setUpdatedIntent(AlexaRequestRequestIntent $intent): self
    {
        $this->updatedIntent = $intent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlotToConfirm(): ?string
    {
        return $this->slotToConfirm;
    }

    /**
     * @param string $slotToConfirm
     * @return self
     */
    public function setSlotToConfirm(string $slotToConfirm): self
    {
        $this->slotToConfirm = $slotToConfirm;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlotToElicit(): ?string
    {
        return $this->slotToElicit;
    }

    /**
     * @param string $slotToElicit
     * @return self
     */
    public function setSlotToElicit(string $slotToElicit): self
    {
        $this->slotToElicit = $slotToElicit;
        return $this;
    }
}
