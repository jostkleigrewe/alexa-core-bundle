<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\DirectiveInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for the Alexa response details.
 *
 * This DTO represents the "response" block in an Alexa response. It contains the
 * output speech, card, reprompt, directives, and the flag indicating whether the
 * session should end.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#response-object
 */
final class ErrorResponse
{
}
