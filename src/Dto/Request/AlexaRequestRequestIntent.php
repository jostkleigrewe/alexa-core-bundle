<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation;

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
     * @Annotation\SerializedName("name")
     */
    private string $name;

    /**
     * An enumeration indicating whether the user has explicitly confirmed or denied the entire intent.
     *
     * @var string $confirmationStatus
     * @Annotation\SerializedName("confirmationStatus")
     */
    private string $confirmationStatus;

    /**
     * @var Collection<string,AlexaRequestRequestIntentSlot> $slots
     * @Annotation\SerializedName("slots")
     */
    private Collection $slots;

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
     * @return ArrayCollection<string,AlexaRequestRequestIntentSlot>
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

    public function addSlot(AlexaRequestRequestIntentSlot $slot): static
    {
        if (!$this->slots->contains($slot)) {
            $this->slots->add($slot);
        }
        return $this;
    }

    public function removeSlot(AlexaRequestRequestIntentSlot $slot): static
    {
        if ($this->slots->contains($slot)) {
            $this->slots->removeElement($slot);
        }
        return $this;
    }

    public function setSlots(Collection $slots): AlexaRequestRequestIntent
    {
        $this->slots = $slots;
        return $this;
    }
}