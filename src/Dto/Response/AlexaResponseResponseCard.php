<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaResponseResponseCard
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 *
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#card-object
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/include-a-card-in-your-skills-response.html
 */
class AlexaResponseResponseCard
{

    const TYPE_SIMPLE = 'Simple';                               // A card that contains a title and plain text content
    const TYPE_STANDARD = 'Standard';                           // A card that contains a title, text content, and an image to display
    const TYPE_LINK_ACCOUNT = 'LinkAccount';                    // A card that displays a link to an authorization URI that the user can use to link their Alexa account with a user in another system.
    const TYPE_ASK_FOR_PERMISSION = 'AskForPermissionsConsent'; // A card that asks the customer for consent to obtain specific customer information, such as Alexa lists or address information.

    /**
     * A string describing the type of card to render.
     *
     * @var string $type
     * @Annotation\SerializedName("type")
     */
    private string $type;

    /**
     * A string containing the title of the card.
     *
     * @var string $title
     * @Annotation\SerializedName("title")
     */
    private string $title = '';

    /**
     * A string containing the contents of a Simple card
     *
     * @var string $content
     * @Annotation\SerializedName("content")
     */
    private string $content = '';

    /**
     * A string containing the text content for a Standard card
     *
     * @var string $text
     * @Annotation\SerializedName("text")
     */
    private string $text = '';

    /**
     * An image object that specifies the URLs for the image to display on a Standard card.
     *
     * @var AlexaResponseResponseCardImage $image
     * @Annotation\SerializedName("image")
     */
    private AlexaResponseResponseCardImage $image;

    public function __construct()
    {
        $this->type = self::TYPE_SIMPLE;
        $this->image = new AlexaResponseResponseCardImage();
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getImage(): AlexaResponseResponseCardImage
    {
        return $this->image;
    }

    public function setImage(AlexaResponseResponseCardImage $image): self
    {
        $this->image = $image;
        return $this;
    }
}