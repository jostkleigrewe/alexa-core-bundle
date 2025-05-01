<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\RequestState;
use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\RequestType;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use DateTimeImmutable;

/**
 *  https://developer.amazon.com/de-DE/docs/alexa/custom-skills/request-types-reference.html#intentrequest-parameters
 */
final readonly class AlexaRequestRequest
{
    /**
     * @param RequestType|null               $type                          The request type (e.g., "LaunchRequest", "IntentRequest").
     * @param string                         $requestId                     A unique identifier for the request.
     * @param DateTimeImmutable              $timestamp                     The time Alexa sent the request in ISO 8601 format.
     * @param string                         $locale                        The user's locale (e.g., "en-US").
     * @param bool                           $shouldLinkResultBeReturned    Indicates if a linked result should be returned.
     * @param AlexaRequestRequestIntent|null $intent                        The intent details if the request is an IntentRequest.
     * @param RequestState|null              $dialogState                   The current state of the multi-turn dialog.
     * @param AlexaRequestRequestError|null  $error                         Error
     * @param AlexaRequestRequestCause|null  $cause                         Session Ended Caused by
     */
    public function __construct(
        #[SerializedName('type')]
        public ?RequestType $type,

        #[SerializedName('requestId')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $requestId,

        #[SerializedName('timestamp')]
        #[Assert\NotNull]
        #[Assert\Type(DateTimeImmutable::class)]
        public DateTimeImmutable $timestamp,

        #[SerializedName('locale')]
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $locale,

        #[SerializedName('shouldLinkResultBeReturned')]
        #[Assert\NotNull]
        #[Assert\Type('bool')]
        public bool $shouldLinkResultBeReturned = false,

        #[SerializedName('intent')]
        #[Assert\Valid]
        public ?AlexaRequestRequestIntent $intent = null,

        #[SerializedName('dialogState')]
        #[Assert\Valid]
        public ?RequestState $dialogState = null,

        #[SerializedName('error')]
        #[Assert\Valid]
        public ?AlexaRequestRequestError $error = null,

        #[SerializedName('cause')]
        #[Assert\Valid]
        public ?AlexaRequestRequestCause $cause = null,
    ) {
        // ...
    }

    public function getType(): ?RequestType
    {
        return $this->type;
    }

    public function getRequestId(): string
    {
        return $this->requestId;
    }

    public function getTimestamp(): DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function isShouldLinkResultBeReturned(): bool
    {
        return $this->shouldLinkResultBeReturned;
    }

    public function getIntent(): ?AlexaRequestRequestIntent
    {
        return $this->intent;
    }

    public function getDialogState(): ?RequestState
    {
        return $this->dialogState;
    }

    public function getError(): ?AlexaRequestRequestError
    {
        return $this->error;
    }

    public function getCause(): ?AlexaRequestRequestCause
    {
        return $this->cause;
    }
}
