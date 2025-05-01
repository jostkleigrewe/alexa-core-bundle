<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionValueRepository;
use Stringable;

#[ORM\Entity(repositoryClass: AlexaSessionValueRepository::class)]
#[ORM\Table(name: "alexa_session_value")]
class AlexaSessionValue implements Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: AlexaSession::class, inversedBy: "sessionValues")]
    private AlexaSession $alexaSession;

    #[ORM\Column(type: "string",length: 255, unique: true, nullable: false)]
    private string $key;

    #[ORM\Column(type: "text")]
    private string $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): AlexaSessionValue
    {
        $this->id = $id;
        return $this;
    }

    public function getAlexaSession(): AlexaSession
    {
        return $this->alexaSession;
    }

    public function setAlexaSession(AlexaSession $alexaSession): AlexaSessionValue
    {
        $this->alexaSession = $alexaSession;
        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): AlexaSessionValue
    {
        $this->key = $key;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): AlexaSessionValue
    {
        $this->value = $value;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf('AlexaSessionValue[id=%s, key=%s, value=%s]', $this->id, $this->key, $this->value);
    }
}
