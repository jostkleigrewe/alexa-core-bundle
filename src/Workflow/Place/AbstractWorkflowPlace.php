<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Workflow\Place;

/**
 * Class AbstractPlace
 *
 * @package  Jostkleigrewe\AlexaCoreBundle\Workflow\Place
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
abstract class AbstractWorkflowPlace implements WorkflowPlaceInterface
{

    /**
     * @var string
     */
    private $currentPlace = 'init';

    /**
     * DoQuery constructor.
     */
    public function __construct()
    {
    }

    /**
     * @inheritDoc
     * @see WorkflowPlaceInterface::getCurrentPlace()
     */
    public function getCurrentPlace(): string
    {
        return $this->currentPlace;
    }

    /**
     * @inheritDoc
     * @see WorkflowPlaceInterface::setCurrentPlace()
     */
    public function setCurrentPlace(string $currentPlace): self
    {
        $this->currentPlace = $currentPlace;
        return $this;
    }



}
