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
     * @var array $slots
     * @Annotation\SerializedName("slots")
     */
    private array $slots;

    public function __construct()
    {
        $this->slots = [];
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

    public function getSlots(): array
    {
        return $this->slots;
    }

    public function getSlotByName(string $slotName): ?AlexaRequestRequestIntentSlot
    {
        return $this->slots[$slotName] ?? null;
    }

    public function setSlots(array $slots): void
    {
        $this->slots = $slots;
    }
}