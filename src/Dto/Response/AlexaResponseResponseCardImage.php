<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Response;

use Symfony\Component\Serializer\Annotation;

/**
 * DTO AlexaResponseResponseCardImage
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 *
 * @see https://developer.amazon.com/en-US/docs/alexa/custom-skills/include-a-card-in-your-skills-response.html#image_size
 */
class AlexaResponseResponseCardImage
{

    const TYPE_SIMPLE = 'Simple';                               // A card that contains a title and plain text content
    const TYPE_STANDARD = 'Standard';                           // A card that contains a title, text content, and an image to display
    const TYPE_LINK_ACCOUNT = 'LinkAccount';                    // A card that displays a link to an authorization URI that the user can use to link their Alexa account with a user in another system.
    const TYPE_ASK_FOR_PERMISSION = 'AskForPermissionsConsent'; // A card that asks the customer for consent to obtain specific customer information, such as Alexa lists or address information.

    /**
     * Displayed on smaller screens 	720w x 480h
     *
     * @var string $smallImageUrl
     * @Annotation\SerializedName("smallImageUrl")
     */
    private string $smallImageUrl = '';

    /**
     * Displayed on larger screens 	1200w x 800h
     *
     * @var string $largeImageUrl
     * @Annotation\SerializedName("largeImageUrl")
     */
    private string $largeImageUrl = '';

    public function getSmallImageUrl(): string
    {
        return $this->smallImageUrl;
    }

    public function setSmallImageUrl(string $smallImageUrl): self
    {
        $this->smallImageUrl = $smallImageUrl;
        return $this;
    }

    public function getLargeImageUrl(): string
    {
        return $this->largeImageUrl;
    }

    public function setLargeImageUrl(string $largeImageUrl): self
    {
        $this->largeImageUrl = $largeImageUrl;
        return $this;
    }
}