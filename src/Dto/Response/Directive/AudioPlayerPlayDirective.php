<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive;

use Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\Items\AudioItem;
use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\AudioPlayerBehavior;
use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\DirectiveType;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for a directive.
 *
 * Send Alexa a request to stream the audio file identified by the specified audioItem.
 * Use the playBehavior parameter to indicate whether to play the stream immediately or to add the stream to the queue.
 * Add the Play directive in your response to Alexa. Include the directive in the directives array in your response.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/audioplayer-interface-reference.html#play
 */
class AudioPlayerPlayDirective extends AbstractDirective
{
    /**
     * @param AudioItem           $audioItem      Information about the audio stream to play.
     * @param AudioPlayerBehavior $playBehavior   Behavior of the audio playback.
     */
    public function __construct(
        #[SerializedName('audioItem')]
        #[Assert\Valid]
        public AudioItem $audioItem,

        #[SerializedName('playBehavior')]
        public AudioPlayerBehavior $playBehavior = AudioPlayerBehavior::REPLACE_ALL,
    ) {
        parent::__construct(DirectiveType::AUDIOPLAYER_PLAY);
    }
}
