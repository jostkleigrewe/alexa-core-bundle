<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum AudioPlayerActivity: string
{
    // Nothing was playing, no enqueued items.
    case IDLE = 'IDLE';

    // Stream was paused.
    case PAUSED = 'PAUSED';

    // Stream was playing.
    case PLAYING = 'PLAYING';

    // Buffer underrun
    case BUFFER_UNDERRUN = 'BUFFER_UNDERRUN';

    // Stream was finished playing.
    case FINISHED = 'FINISHED';

    // Stream was interrupted.
    case STOPPED = 'STOPPED';
}
