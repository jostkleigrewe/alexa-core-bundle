<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Repräsentiert das Authentifizierungs-Vertrauensniveau im Person-Objekt.
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Dto\Request\Context\System
 * @author    Sven Jostkleigrewe
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/add-personalization-to-your-skill.html
 * @link      https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#system-object
 */
final readonly class AlexaRequestContextSystemPersonAuthConfidence
{
    /**
     * @param int $level Vertrauensniveau der Authentifizierung.
     */
    public function __construct(
        #[SerializedName('level')]
        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        public int $level,
    ) {
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}
