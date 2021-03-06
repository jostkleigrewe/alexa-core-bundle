<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Request;

use JMS\Serializer\Annotation;

/**
 * Class AlexaRequestRequestIntentSlot
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Request
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-types-reference.html#slot-object
 */
class AlexaRequestRequestIntentSlot
{

    const CONFIRM_STATUS_NONE = 'NONE';
    const CONFIRM_STATUS_CONFIRMED = 'CONFIRMED';
    const CONFIRM_STATUS_DENIED = 'DENIED';

    /**
     * A string that represents the name of the slot.
     *
     * @var string $name
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    private $name;

    /**
     * A string that represents the value the user spoke for the slot.
     *
     * @var string|null $value
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("value")
     */
    private $value;

    /**
     * An enumeration indicating whether the user has explicitly confirmed or denied the value of this slot.
     *
     * @var string $confirmationStatus
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("confirmationStatus")
     */
    private $confirmationStatus;

    /**
     * @var string $source
     * @Annotation\Type("string")
     * @Annotation\SerializedName("source")
     */
    private $source;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfirmationStatus(): string
    {
        return $this->confirmationStatus;
    }

    /**
     * @param string $confirmationStatus
     * @return self
     */
    public function setConfirmationStatus(string $confirmationStatus): self
    {
        $this->confirmationStatus = $confirmationStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return self
     */
    public function setSource(string $source): self
    {
        $this->source = $source;
        return $this;
    }
}