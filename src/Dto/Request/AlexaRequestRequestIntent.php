<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequestRequestIntentSlot;

/**
 * Class AlexaRequestRequestIntent
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Request
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaRequestRequestIntent
{

    const CONFIRM_STATUS_NONE = 'NONE';
    const CONFIRM_STATUS_CONFIRMED = 'CONFIRMED';
    const CONFIRM_STATUS_DENIED = 'DENIED';

    /**
     * A string representing the name of the intent.
     *
     * @var string $name
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("name")
     */
    private $name;

    /**
     * An enumeration indicating whether the user has explicitly confirmed or denied the entire intent.
     *
     * @var string $confirmationStatus
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("confirmationStatus")
     */
    private $confirmationStatus;

    /**
     * @var ArrayCollection $slots
     *
     * @Annotation\Type("ArrayCollection<string,Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequestRequestIntentSlot>")
     * @Annotation\SerializedName("slots")
     */
    private $slots;

    /**
     * AlexaRequestRequestIntent constructor.
     */
    public function __construct()
    {
        $this->slots = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AlexaRequestRequestIntent
     */
    public function setName(string $name): AlexaRequestRequestIntent
    {
        $this->name = $name;
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
     * @return AlexaRequestRequestIntent
     */
    public function setConfirmationStatus(string $confirmationStatus): AlexaRequestRequestIntent
    {
        $this->confirmationStatus = $confirmationStatus;
        return $this;
    }

    /**
     * @return ArrayCollection|AlexaRequestRequestIntentSlot[]
     */
    public function getSlots(): ArrayCollection
    {
        return $this->slots;
    }

    /**
     * @param string $slotName
     * @return AlexaRequestRequestIntentSlot|null
     */
    public function getSlotByName(string $slotName): ?AlexaRequestRequestIntentSlot
    {
        return $this->slots->offsetGet($slotName);
    }

//    /**
//     * @param AlexaRequestRequestIntentSlot $alexaRequestRequestIntentSlot
//     * @return AlexaRequestRequestIntent
//     */
//    public function addSlot(AlexaRequestRequestIntentSlot $alexaRequestRequestIntentSlot): AlexaRequestRequestIntent
//    {
//        $this->slots->add($alexaRequestRequestIntentSlot);
//        return $this;
//    }
//
//    /**
//     * @param AlexaRequestRequestIntentSlot $alexaRequestRequestIntentSlot
//     * @return AlexaRequestRequestIntent
//     */
//    public function removeSlot(AlexaRequestRequestIntentSlot $alexaRequestRequestIntentSlot): AlexaRequestRequestIntent
//    {
//        $this->slots->remove($alexaRequestRequestIntentSlot);
//        return $this;
//    }
//
//    /**
//     * @param ArrayCollection $slots
//     * @return AlexaRequestRequestIntent
//     */
//    public function setSlots(ArrayCollection $slots): AlexaRequestRequestIntent
//    {
//        $this->slots = $slots;
//        return $this;
//    }
}