<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\DirectiveType;

/**
 * Class DelegateDirective
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Response\Directive
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 * @see
 */
class DelegateDirective extends BaseDirective
{
    public function __construct()
    {
        parent::__construct(DirectiveType::DELEGATE);
    }
}
