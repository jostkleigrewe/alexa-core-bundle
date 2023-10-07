<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;
use DateTimeImmutable;

/**
 * Class AlexaRequestRequest
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Request
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 *
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-types-reference.html#intentrequest-parameters
 */
class AlexaRequestRequest
{

    //  When the user invokes your skill without providing a specific intent.
    const TYPE_LAUNCH = 'LaunchRequest';

    //  When the user makes a request that corresponds to one of the intents defined in your intent schema.
    const TYPE_INTENT = 'IntentRequest';

    //  When the current skill session ends for any reason other than your code closing the session.
    const TYPE_SESSION_ENDED = 'SessionEndedRequest';

    //  When the Alexa service is querying a skill to determine whether the skill can understand and fulfill the intent request with detected slots, before actually asking the skill to take action.
    const TYPE_CAN_FULFILL_INTENT = 'CanFulfillIntentRequest';

    //  User invoked the intent that has a dialog.
    const STATE_STARTED = 'STARTED';

    //  Dialog is in progress.
    const STATE_IN_PROGRESS = 'IN_PROGRESS';

    //  Dialog is complete. All required slots contain values, and all values meet any defined slot validation rules.
    const STATE_COMPLETED = 'COMPLETED';

    /**
     * Describes the request type with the value as: "LaunchRequest"
     *
     * @var string $type
     * @Annotation\SerializedName("type")
     */
    private string $type;

    /**
     * Represents a unique identifier for the specific request.
     *
     * @var string $requestId
     * @Annotation\SerializedName("requestId")
     */
    private string $requestId;

    /**
     * Provides the date and time when Alexa sent the request as an ISO 8601 formatted string.
     *
     * @var DateTimeImmutable $timestamp
     * @Annotation\SerializedName("timestamp")
     */
    private DateTimeImmutable $timestamp;

    /**
     * A string indicating the user's locale. For example: en-US.
     *
     * @var string $locale
     * @Annotation\SerializedName("locale")
     */
    private string $locale;

    /**
     * @var bool $shouldLinkResultBeReturned
     * @Annotation\SerializedName("shouldLinkResultBeReturned")
     */
    private bool $shouldLinkResultBeReturned;

    /**
     * @var AlexaRequestRequestIntent $intent
     * @Annotation\SerializedName("intent")
     */
    private AlexaRequestRequestIntent $intent;

    /**
     * Enumeration indicating the status of the multi-turn dialog.
     *
     * @var string $dialogState
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("dialogState")
     */
    private string $dialogState;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }

    /**
     * @param string $requestId
     * @return self
     */
    public function setRequestId(string $requestId): self
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime $timestamp
     * @return self
     */
    public function setTimestamp(\DateTime $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return self
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShouldLinkResultBeReturned(): bool
    {
        return $this->shouldLinkResultBeReturned;
    }

    /**
     * @param bool $shouldLinkResultBeReturned
     * @return self
     */
    public function setShouldLinkResultBeReturned(bool $shouldLinkResultBeReturned): self
    {
        $this->shouldLinkResultBeReturned = $shouldLinkResultBeReturned;
        return $this;
    }

    /**
     * @return AlexaRequestRequestIntent|null
     */
    public function getIntent(): ?AlexaRequestRequestIntent
    {
        return $this->intent;
    }

    /**
     * @param AlexaRequestRequestIntent $intent
     * @return self
     */
    public function setIntent(AlexaRequestRequestIntent $intent): self
    {
        $this->intent = $intent;
        return $this;
    }

    /**
     * @return string
     */
    public function getDialogState(): string
    {
        return $this->dialogState;
    }

    /**
     * @param string $dialogState
     * @return self
     */
    public function setDialogState(string $dialogState): self
    {
        $this->dialogState = $dialogState;
        return $this;
    }

}