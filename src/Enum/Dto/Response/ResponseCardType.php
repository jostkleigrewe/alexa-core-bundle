<?php

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum ResponseCardType: string
{
    // A card that contains a title and plain text content
    case SIMPLE = 'Simple';

    // A card that contains a title, text content, and an image to display
    case STANDARD = 'Standard';

    // A card that displays a link to an authorization URI that the user can use
    // to link their Alexa account with a user in another system.
    case LINK_ACCOUNT = 'LinkAccount';

    // A card that asks the customer for consent to obtain specific customer information,
    // such as Alexa lists or address information.
    case ASK_FOR_PERMISSION = 'AskForPermissionsConsent';
}
