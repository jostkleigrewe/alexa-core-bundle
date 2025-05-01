<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum OutputSpeechPlayBehavior: string
{
    // Add this speech to the end of the queue.
    case ENQUEUE = 'ENQUEUE';

    // Immediately begin playback of this speech
    case REPLACE_ALL = 'REPLACE_ALL';

    // Replace all speech in the queue
    case REPLACE_ENQUEUED = 'REPLACE_ENQUEUED';
}
