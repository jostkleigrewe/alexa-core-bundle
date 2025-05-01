<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\SlotConfirmationStatus;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents a slot object within an Alexa intent request.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/de-DE/docs/alexa/custom-skills/request-types-reference.html#slot-object
 */
final readonly class AlexaRequestRequestIntentSlot
{
    /**
     * @param string                        $name               Der Name des Slots.
     * @param string|null                   $value              Der vom Benutzer für diesen Slot bereitgestellte Wert.
     * @param SlotConfirmationStatus|null   $confirmationStatus Der Bestätigungsstatus des Slots (NONE, CONFIRMED, DENIED).
     * @param string|null                   $source             Die Quelle des Slot-Wertes, typischerweise 'USER'.
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
        public ?SlotConfirmationStatus $confirmationStatus = null,

        #[SerializedName('source')]
        #[Assert\Type('string')]
        public ?string $source = 'USER',

        #[SerializedName('resolutions')]
        #[Assert\Valid]
        public ?AlexaRequestRequestIntentSlotResolutions $resolutions = null,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function getConfirmationStatus(): ?SlotConfirmationStatus
    {
        return $this->confirmationStatus;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function getResolutions(): ?AlexaRequestRequestIntentSlotResolutions
    {
        return $this->resolutions;
    }
}
