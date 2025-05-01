<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\DirectiveType;

/**
 * Interface DialogInterface
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Response\Directive
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-parameters
 */
interface DirectiveInterface
{
    /**
     * @return DirectiveType
     * @see DirectiveInterface::getType()
     */
    public function getType(): DirectiveType;
}
