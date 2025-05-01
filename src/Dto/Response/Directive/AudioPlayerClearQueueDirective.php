<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\AudioPlayerClearBehavior;
use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\DirectiveType;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Data Transfer Object (DTO) for a directive.
 *
 * Clears the audio playback queue. You can set this directive to clear the queue without stopping
 * the currently playing stream, or clear the queue and stop any currently playing stream.
 * Include the directive in the directives array in your response.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/audioplayer-interface-reference.html#clearqueue
 */
class AudioPlayerClearQueueDirective extends AbstractDirective
{
    public function __construct(
        #[SerializedName('playBehavior')]
        public AudioPlayerClearBehavior $playBehavior = AudioPlayerClearBehavior::CLEAR_ALL,
    ) {
        parent::__construct(DirectiveType::AUDIOPLAYER_PLAY);
    }
}
