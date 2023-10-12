<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent;

/**
 * Class IntentChain
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class IntentChain
{
    private array $intents;

    public function __construct()
    {
        $this->intents = [];
    }

    public function addIntent(IntentInterface $intent): static
    {
        $this->intents[] = $intent;

        return $this;
    }

     public function getIntents(): array
    {
        return $this->intents;
    }
}