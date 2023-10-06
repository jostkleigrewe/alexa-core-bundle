<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\Slot;

use JMS\Serializer\Annotation;
use Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestRequestIntentSlot;

/**
 * Class DialogSlot
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Response\Dialog\Slot
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class DialogSlot
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
     * @var string $value
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
     * @return AlexaRequestRequestIntentSlot
     */
    public function setName(string $name): AlexaRequestRequestIntentSlot
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return AlexaRequestRequestIntentSlot
     */
    public function setValue(string $value): AlexaRequestRequestIntentSlot
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
     * @return AlexaRequestRequestIntentSlot
     */
    public function setConfirmationStatus(string $confirmationStatus): AlexaRequestRequestIntentSlot
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
     * @return AlexaRequestRequestIntentSlot
     */
    public function setSource(string $source): AlexaRequestRequestIntentSlot
    {
        $this->source = $source;
        return $this;
    }
}