<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaUserValueRepository;

#[ORM\Entity(repositoryClass: AlexaUserValueRepository::class)]
#[ORM\Table(name: "alexa_user_value")]
class AlexaUserValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: AlexaUser::class, inversedBy: "userValues")]
    private AlexaUser $alexaUser;

    #[ORM\Column(type: "string",length: 255, unique: true, nullable: false)]
    private string $key;

    #[ORM\Column(type: "text")]
    private string $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): AlexaUserValue
    {
        $this->id = $id;
        return $this;
    }

    public function getAlexaUser(): AlexaUser
    {
        return $this->alexaUser;
    }

    public function setAlexaUser(AlexaUser $alexaUser): AlexaUserValue
    {
        $this->alexaUser = $alexaUser;
        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): AlexaUserValue
    {
        $this->key = $key;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): AlexaUserValue
    {
        $this->value = $value;
        return $this;
    }

    public function __toString()
    {
        return __METHOD__;
    }
}
