<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\IntentConfirmationStatus;
use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\SlotConfirmationStatus;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for Alexa intents.
 *
 * This DTO represents the intent object in an Alexa request. It contains the name of the intent,
 * the confirmation status, and a collection of slots. The slots are provided as an associative array
 * where the keys are the slot names and the values are instances of AlexaRequestRequestIntentSlot.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Request
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/de-DE/docs/alexa/custom-skills/request-types-reference.html#intent-object
 */
final class AlexaRequestRequestIntent
{
    /**
     * @param string                                        $name               The name of the intent.
     * @param IntentConfirmationStatus                      $confirmationStatus The confirmation status of the intent
     * @param array<string, AlexaRequestRequestIntentSlot>  $slots              A collection of slots for the intent.
     */
    public function __construct(
        #[SerializedName('name')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public readonly string $name,

        #[SerializedName('confirmationStatus')]
        public IntentConfirmationStatus $confirmationStatus,

        #[SerializedName('slots')]
        #[Assert\Type('array')]
        #[Assert\Valid]
        public readonly array $slots = []
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getConfirmationStatus(): IntentConfirmationStatus
    {
        return $this->confirmationStatus;
    }

    public function getSlots(): array
    {
        return $this->slots;
    }

    /**
     * Retrieves a slot by its name.
     *
     * @param string $slotName The name of the slot to retrieve.
     *
     * @return AlexaRequestRequestIntentSlot|null The requested slot if it exists, or null if it does not.
     */
    public function getSlotByName(string $slotName): ?AlexaRequestRequestIntentSlot
    {
        return $this->slots[$slotName] ?? null;
    }
}
