<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum AudioPlayerBehavior: string
{
    // Add the specified stream to the end of the current queue. This request doesn't impact the currently playing stream.
    case ENQUEUE = 'ENQUEUE';

    // Immediately begin playback of the specified stream, and replace current and enqueued streams.
    case REPLACE_ALL = 'REPLACE_ALL';

    // Replace all streams in the queue. This request doesn't impact the currently playing stream.
    case REPLACE_ENQUEUED = 'REPLACE_ENQUEUED';
}
