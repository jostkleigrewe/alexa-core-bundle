<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum AudioPlayerClearBehavior: string
{
    // Clears the queue and continues to play the currently playing stream.
    case CLEAR_ENQUEUED = 'CLEAR_ENQUEUED';

    // Clears the entire playback queue and stops the currently playing stream (if applicable).
    case CLEAR_ALL = 'CLEAR_ALL';
}
