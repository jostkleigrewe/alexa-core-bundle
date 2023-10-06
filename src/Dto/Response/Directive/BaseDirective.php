<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;
use Symfony\Component\Serializer\Annotation;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequestRequestIntent;

/**
 * Class BaseDirective
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Response\Directive
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-parameters
 */
class BaseDirective implements DirectiveInterface
{
    const TYPE = "Dialog.ElicitSlot";

    /**
     * @var string $type
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("type")
     */
    private $type;

    /**
     * An intent object. Use this to change intents during the dialog or set slot values and confirmation status.
     *
     * @var AlexaRequestRequestIntent $updatedIntent
     *
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestRequestIntent")
     * @Annotation\SerializedName("updatedIntent")
     */
    private $updatedIntent;

    /**
     * The name of the slot to confirm.
     *
     * @var string $slotToConfirm|null
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("slotToConfirm")
     */
    private $slotToConfirm;

    /**
     * The name of the slot to elicit.
     *
     * @var string $slotToElicit|null
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("slotToElicit")
     */
    private $slotToElicit;

    /**
     * AlexaResponse constructor.
     */
    public function __construct()
    {
        $this->type = static::TYPE;
    }


    /**
     * @return string
     */
    public function getType(): string
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
     * @param string $slotToElicit
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