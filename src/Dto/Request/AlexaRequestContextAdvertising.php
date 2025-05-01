<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents the Advertising object in the Alexa context.
 *
 * This object contains advertising-related preferences and user settings.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License <https://opensource.org/licenses/MIT>
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html
 * @since     1.0.0
 */
final readonly class AlexaRequestContextAdvertising
{
    /**
     * @param string|null $advertisingId    The advertising identifier.
     * @param bool|null   $limitAdTracking  Indicates if ad tracking is limited.
     */
    public function __construct(
        #[SerializedName('advertisingId')]
        #[Assert\Type('string')]
        public ?string $advertisingId = null,

        #[SerializedName('limitAdTracking')]
        #[Assert\Type('bool')]
        public ?bool $limitAdTracking = null,
    ) {
    }

    public function getAdvertisingId(): ?string
    {
        return $this->advertisingId;
    }

    public function getLimitAdTracking(): ?bool
    {
        return $this->limitAdTracking;
    }
}
