<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for Alexa card images.
 *
 * This DTO represents the image object for a Standard card in an Alexa response.
 * It includes URLs for both small and large images.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Response
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#card-object
 */
final class AlexaResponseResponseCardImage
{
    /**
     * @param string|null $smallImageUrl URL of the small image.
     * @param string|null $largeImageUrl URL of the large image.
     */
    public function __construct(
        #[SerializedName('smallImageUrl')]
        #[Assert\Type('string')]
        public ?string $smallImageUrl = null,

        #[SerializedName('largeImageUrl')]
        #[Assert\Type('string')]
        public ?string $largeImageUrl = null,
    ) {
    }

    public function setSmallImageUrl(?string $smallImageUrl): self
    {
        $this->smallImageUrl = $smallImageUrl;
        return $this;
    }

    public function setLargeImageUrl(?string $largeImageUrl): self
    {
        $this->largeImageUrl = $largeImageUrl;
        return $this;
    }
}
