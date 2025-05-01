<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionRepository;

#[ORM\Entity(repositoryClass: AlexaSessionRepository::class)]
#[ORM\Table(name: "alexa_session")]
class AlexaSession implements \Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true, nullable: false)]
    private string $sessionId;

    #[ORM\ManyToOne(targetEntity: AlexaUser::class, fetch: 'EAGER')]
    private ?AlexaUser $alexaUser;

    #[ORM\ManyToOne(targetEntity: AlexaDevice::class, fetch: 'EAGER')]
    private ?AlexaDevice $alexaDevice;

    #[ORM\OneToMany(targetEntity: AlexaSessionValue::class, mappedBy: 'alexaSession', fetch: 'EAGER')]
    private Collection $sessionValues;

    public function __construct()
    {
        $this->sessionValues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function setSessionId(string $sessionId): static
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    public function getAlexaUser(): ?AlexaUser
    {
        return $this->alexaUser;
    }

    public function setAlexaUser(AlexaUser $alexaUser): static
    {
        $this->alexaUser = $alexaUser;
        return $this;
    }

    public function getAlexaDevice(): ?AlexaDevice
    {
        return $this->alexaDevice;
    }

    public function setAlexaDevice(AlexaDevice $alexaDevice): static
    {
        $this->alexaDevice = $alexaDevice;
        return $this;
    }

    /**
     * @return Collection<int, AlexaSessionValue>
     */
    public function getSessionValues(): Collection
    {
        return $this->sessionValues;
    }

    public function addSessionValue(AlexaSessionValue $alexaSessionValue): static
    {
        if (!$this->sessionValues->contains($alexaSessionValue)) {
            $this->sessionValues->add($alexaSessionValue);
            $alexaSessionValue->setAlexaSession($this);
        }

        return $this;
    }

    public function removeSessionValue(AlexaSessionValue $alexaSessionValue): static
    {
        if ($this->sessionValues->contains($alexaSessionValue)) {
            $this->sessionValues->removeElement($alexaSessionValue);
        }
        return $this;
    }

    public function __toString(): string
    {
        return sprintf('AlexaSession[id=%s, sessionId=%s]', $this->id, $this->sessionId);
    }
}
