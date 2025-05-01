<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum DirectiveType: string {
    case ELICIT_SLOT          = 'Dialog.ElicitSlot';
    case CONFIRM_SLOT         = 'Dialog.ConfirmSlot';
    case CONFIRM_INTENT       = 'Dialog.ConfirmIntent';
    case DELEGATE             = 'Dialog.Delegate';
    case UPDATE_DYNAMIC_ENTITIES = 'Dialog.UpdateDynamicEntities';
}
