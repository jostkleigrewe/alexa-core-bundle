<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum SlotConfirmationStatus: string
{
    case NONE = 'NONE';
    case CONFIRMED = 'CONFIRMED';
    case DENIED = 'DENIED';
}
