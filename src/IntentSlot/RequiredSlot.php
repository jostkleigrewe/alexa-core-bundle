<?php

declare(strict_types=1);

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
     * @var string $value
     */
    private string $value;

    /**
     * RequiredSlot constructor.
     * @param string $slotName
     * @param string $askMissing
     */
    public function __construct(private readonly string $slotName, private string $askMissing)
    {
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
