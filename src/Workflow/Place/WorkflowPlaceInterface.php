<?php

namespace Jostkleigrewe\AlexaCoreBundle\Workflow\Place;

/**
 * Interface WorkflowPlaceInterface
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Workflow\Place
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
interface WorkflowPlaceInterface
{

    /**
     * @return string
     */
    public function getCurrentPlace(): string;

    /**
     * @param string $currentPlace
     */
    public function setCurrentPlace(string $currentPlace);
}
