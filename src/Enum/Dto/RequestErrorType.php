<?php

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto;

/**
 * https://developer.amazon.com/de-DE/docs/alexa/custom-skills/request-types-reference.html#sessionendedrequest-parameters
 */
enum RequestErrorType: string
{
    case INVALID_RESPONSE = 'INVALID_RESPONSE';
    case DEVICE_COMMUNICATION_ERROR = 'DEVICE_COMMUNICATION_ERROR';
    case INTERNAL_SERVICE_ERROR = 'INTERNAL_SERVICE_ERROR';
    case ENDPOINT_TIMEOUT = 'ENDPOINT_TIMEOUT';
}
