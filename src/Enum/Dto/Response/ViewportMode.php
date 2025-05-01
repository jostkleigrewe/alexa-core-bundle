<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

/**
 * @link https://developer.amazon.com/en-US/docs/alexa/alexa-presentation-language/apl-viewport-property.html#viewport_mode_property
 */
enum ViewportMode: string
{
    //  Used by the driver in a vehicle.
    case AUTO = 'AUTO';

    //  A table-top or fixed-position devices.
    case HUB = 'HUB';

    //  A handheld device carried by the user.
    case MOBILE = 'MOBILE';

    //  A desktop or laptop computer.
    case PC = 'PC';

    //  A television or projected display.
    case TV = 'TV';
}
