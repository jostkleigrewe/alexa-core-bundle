<?php

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum RequestState: string
{
    // User invoked the intent that has a dialog.
    case STARTED = 'STARTED';

    // Dialog is in progress.
    case IN_PROGRESS = 'IN_PROGRESS';

    // Dialog is complete. All required slots contain values, and all values meet any defined slot validation rules.
    case COMPLETED = 'COMPLETED';
}
