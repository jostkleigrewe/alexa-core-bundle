<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\IntentSlot;

/**
 * Class RequiredSlot
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\IntentSlot
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class RequiredSlot
{
    /**
     * @var string $slotName
     */
    private string $slotName;

    /**
     * @var string $value
     */
    private string $value;

    /**
     * @var string $askMissing
     */
    private string $askMissing;

    /**
     * RequiredSlot constructor.
     * @param string $slotName
     * @param string $askMissing
     */
    public function __construct(
        string $slotName,
        string $askMissing
    ) {
        $this->slotName = $slotName;
        $this->askMissing = $askMissing;
    }

    /**
     * @return string
     */
    public function getSlotName(): string
    {
        return $this->slotName;
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
     * @return RequiredSlot
     */
    public function setValue(string $value): RequiredSlot
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAskMissing(): string
    {
        return $this->askMissing;
    }

    /**
     * @param string $askMissing
     * @return RequiredSlot
     */
    public function setAskMissing(string $askMissing): RequiredSlot
    {
        $this->askMissing = $askMissing;
        return $this;
    }
}