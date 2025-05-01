<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum DirectiveType: string
{
    case ELICIT_SLOT          = 'Dialog.ElicitSlot';
    case CONFIRM_SLOT         = 'Dialog.ConfirmSlot';
    case CONFIRM_INTENT       = 'Dialog.ConfirmIntent';
    case DELEGATE             = 'Dialog.Delegate';
    case UPDATE_DYNAMIC_ENTITIES = 'Dialog.UpdateDynamicEntities';

    // AUDIOPLAYER
    case AUDIOPLAYER_PLAY = 'AudioPlayer.Play';
    case AUDIOPLAYER_STOP = 'AudioPlayer.Stop';
    case AUDIOPLAYER_CLEAR_QUEUE = 'AudioPlayer.ClearQueue';
}
