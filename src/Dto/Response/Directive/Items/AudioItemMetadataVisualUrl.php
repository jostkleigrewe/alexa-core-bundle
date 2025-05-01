<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response\Directive\Items;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for Alexa cards.
 *
 * This DTO represents the card object in an Alexa response. It includes the card type,
 * title, content, and optional image information.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/audioplayer-interface-reference.html#play
 */
final readonly class AudioItemMetadataVisualUrl
{
    /**
     * @param string $url Image url.
     */
    public function __construct(
        #[SerializedName('url')]
        #[Assert\Type('string')]
        public string $url,
    ) {
        // ...
    }
}
