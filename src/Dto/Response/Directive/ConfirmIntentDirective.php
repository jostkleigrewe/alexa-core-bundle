<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

/**
 * Class ConfirmIntentDirective
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Response\Dialog
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/dialog-interface-reference.html#confirmintent
 */
class ConfirmIntentDirective extends BaseDirective
{
    const TYPE = "Dialog.ConfirmIntent";
}