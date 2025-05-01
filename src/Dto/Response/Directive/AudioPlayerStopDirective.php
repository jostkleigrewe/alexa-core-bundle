<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\DirectiveType;

/**
 * Data Transfer Object (DTO) for a directive.
 *
 * Stops the current audio playback. Include the directive in the directives array in your response.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/audioplayer-interface-reference.html#stop
 */
class AudioPlayerStopDirective extends AbstractDirective
{
    public function __construct()
    {
        parent::__construct(DirectiveType::AUDIOPLAYER_STOP);
    }
}
