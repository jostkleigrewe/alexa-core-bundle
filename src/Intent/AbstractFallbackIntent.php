<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent;

/**
 * Class AbstractFallbackIntent
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
abstract class AbstractFallbackIntent extends AbstractIntent
{
    const IS_FALLBACK = true;
}