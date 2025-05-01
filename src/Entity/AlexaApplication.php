<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaApplicationRepository;

#[ORM\Entity(repositoryClass: AlexaApplicationRepository::class)]
#[ORM\Table(name: "alexa_application")]
class AlexaApplication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $applicationId;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $name = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    public function setApplicationId(string $applicationId): AlexaApplication
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): AlexaApplication
    {
        $this->name = $name;
        return $this;
    }

    public function __toString(): string
    {
        return __METHOD__;
    }
}
