<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response\ResponseCardType;
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
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#card-object
 */
final class AlexaResponseResponseCard
{
    /**
     * @param ResponseCardType                      $type    The card type ("Simple", "Standard", or "LinkAccount").
     * @param string|null                           $title   The title of the card.
     * @param string|null                           $content The content of the card (used for Simple cards).
     * @param string|null                           $text    The text content of the card (used for Standard cards).
     * @param AlexaResponseResponseCardImage|null   $image   The image information for the card
     *                                                       (applicable for Standard cards).
     */
    public function __construct(
        #[SerializedName('type')]
        #[Assert\NotBlank]
        private ResponseCardType $type,

        #[SerializedName('title')]
        #[Assert\Type('string')]
        private ?string $title = null,

        #[SerializedName('content')]
        #[Assert\Type('string')]
        private ?string $content = null,

        #[SerializedName('text')]
        #[Assert\Type('string')]
        private ?string $text = null,

        #[SerializedName('image')]
        #[Assert\Valid]
        private ?AlexaResponseResponseCardImage $image = null,
    ) {
    }

    public static function create(): self
    {
        return new self(
            ResponseCardType::SIMPLE,
            'Title',
            'Content',
            'Text',
            null
        );
    }

    public function getType(): ResponseCardType
    {
        return $this->type;
    }

    public function setType(ResponseCardType $type): AlexaResponseResponseCard
    {
        $this->type = $type;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): AlexaResponseResponseCard
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): AlexaResponseResponseCard
    {
        $this->content = $content;
        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): AlexaResponseResponseCard
    {
        $this->text = $text;
        return $this;
    }

    public function addText(?string $text): AlexaResponseResponseCard
    {
        $this->text .= PHP_EOL . $text;
        return $this;
    }

    public function getImage(): ?AlexaResponseResponseCardImage
    {
        return $this->image;
    }

    public function setImage(?AlexaResponseResponseCardImage $image): AlexaResponseResponseCard
    {
        $this->image = $image;
        return $this;
    }
}
