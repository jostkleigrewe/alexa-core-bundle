<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\Slot;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\SlotConfirmationStatus;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents a slot object within a dialog directive in an Alexa response.
 *
 * This DTO contains the slot's name, the value provided by the user,
 * the confirmation status as an enumeration, and the source of the slot value.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\Slot
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#slot-object
 */
class DialogSlot
{
    /**
     * @param string                    $name The name of the slot.
     * @param string|null               $value The value provided by the user for this slot.
     * @param SlotConfirmationStatus    $confirmationStatus The confirmation status of the slot.
     * @param string|null               $source The source of the slot value, typically 'USER'.
     */
    public function __construct(
        #[SerializedName('name')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $name,

        #[SerializedName('value')]
        #[Assert\Type('string')]
        public ?string $value = null,

        #[SerializedName('confirmationStatus')]
        public SlotConfirmationStatus $confirmationStatus,

        #[SerializedName('source')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public ?string $source = 'USER'
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    public function getConfirmationStatus(): SlotConfirmationStatus
    {
        return $this->confirmationStatus;
    }

    public function setConfirmationStatus(SlotConfirmationStatus $confirmationStatus): void
    {
        $this->confirmationStatus = $confirmationStatus;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): void
    {
        $this->source = $source;
    }
}
