<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\DirectiveType;

/**
 * Class ElicitSlotDialog
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Response\Dialog
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/dialog-interface-reference.html#elicitslot
 */
class ElicitSlotDirective extends BaseDirective
{
    public function __construct()
    {
        parent::__construct(DirectiveType::ELICIT_SLOT);
    }
}
