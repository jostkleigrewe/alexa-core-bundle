<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;
enum IntentConfirmationStatus: string
{
    case NONE = 'NONE';
    case CONFIRMED = 'CONFIRMED';
    case DENIED = 'DENIED';
}
