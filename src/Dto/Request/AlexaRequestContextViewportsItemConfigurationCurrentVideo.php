<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Transfer Object (DTO) for video capabilities in the current configuration of a viewports item.
 *
 * This DTO contains the list of supported video codecs.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\ViewportsItem
 * @license   MIT License
 */
final readonly class AlexaRequestContextViewportsItemConfigurationCurrentVideo
{
    /**
     * @param string[] $codecs The list of supported video codecs.
     */
    public function __construct(
        #[SerializedName('codecs')]
        #[Assert\Type('array')]
        public array $codecs,
    ) {
    }

    public function getCodecs(): array
    {
        return $this->codecs;
    }
}
