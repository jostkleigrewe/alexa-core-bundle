<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent;

/**
 * Class IntentChain
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class IntentChain
{
    /**
     * @var array $intents
     */
    private array $intents;

    /**
     * IntentChain constructor.
     */
    public function __construct()
    {
        $this->intents = [];
    }

    /**
     * @param IntentInterface $intent
     */
    public function addIntent(IntentInterface $intent): static
    {
        $this->intents[] = $intent;

        return $this;
    }

    /**
     * @return array
     */
    public function getIntents(): array
    {
        return $this->intents;
    }
}