<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Class AlexaResponseResponseCard
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Response
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
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
    *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("type")
     */
    private $type;

    /**
     * A string containing the title of the card.
     *
     * @var string $title
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("title")
     */
    private $title;

    /**
     * A string containing the contents of a Simple card
     *
     * @var string $content
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("content")
     */
    private $content;

    /**
     * A string containing the text content for a Standard card
     *
     * @var string $text
     *
     * @Annotation\Type("string")
     * @Annotation\SerializedName("text")
     */
    private $text;

    /**
     * An image object that specifies the URLs for the image to display on a Standard card.
     *
     * @var AlexaResponseResponseCardImage $image
     *
     * @Annotation\Type("Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponseResponseCardImage")
     * @Annotation\SerializedName("image")
     */
    private $image;

    /**
     * AlexaResponse constructor.
     */
    public function __construct()
    {
        $this->type = self::TYPE_SIMPLE;
    }

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return AlexaResponseResponseCardImage
     */
    public function getImage(): AlexaResponseResponseCardImage
    {
        if ($this->image === null) {
            $this->image = new AlexaResponseResponseCardImage();
        }

        return $this->image;
    }

    /**
     * @param AlexaResponseResponseCardImage $image
     * @return self
     */
    public function setImage(AlexaResponseResponseCardImage $image): self
    {
        $this->image = $image;
        return $this;
    }



}