<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum OutputSpeechType: string
{
    // Text
    case TEXT = 'PlainText';

    // SSML
    case SSML = 'SSML';
}
