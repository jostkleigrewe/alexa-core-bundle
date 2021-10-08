<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent;

/**
 * Class IntentCollection
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class IntentCollection
{

    /**
     * @var iterable $handlers
     */
    private $handlers;

    /**
     * IntentCollection constructor.
     *
     * @param iterable $handlers
     */
    public function __construct(iterable $handlers)
    {
        $this->handlers = $handlers;
    }

    /**
     * @return iterable
     */
    public function getHandlers(): iterable
    {
        return $this->handlers;
    }

    /**
     * @return iterable
     */
    public function yieldHandlers(): iterable
    {
        foreach ($this->handlers as $handler) {
            yield $handler;
        }
    }
}