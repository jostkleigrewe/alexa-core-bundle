<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\PersistentCollection;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaUserRepository;

#[ORM\Entity(repositoryClass: AlexaUserRepository::class)]
#[ORM\Table(name: "alexa_user")]
class AlexaUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $alexaId = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $role = null;

    #[ORM\ManyToMany(targetEntity: AlexaDevice::class, mappedBy: 'alexaUsers')]
    private Collection $alexaDevices;

    #[ORM\OneToMany(targetEntity: AlexaUserValue::class, mappedBy: 'alexaUser')]
    private Collection $userValues;

    public function __construct() {
        $this->alexaDevices = new ArrayCollection();
        $this->userValues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlexaId(): ?string
    {
        return $this->alexaId;
    }

    public function setAlexaId(string $alexaId): static
    {
        $this->alexaId = $alexaId;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return Collection<int, AlexaDevice>
     */
    public function getAlexaDevices(): Collection
    {
        return $this->alexaDevices;
    }

    public function addAlexaDevice(AlexaDevice $alexaDevice): static
    {
        if (!$this->alexaDevices->contains($alexaDevice)) {
            $this->alexaDevices->add($alexaDevice);
            $alexaDevice->addAlexaUser($this);
        }

        return $this;
    }

    public function removeAlexaDevice(AlexaDevice $alexaDevice): static
    {
        $this->alexaDevices->removeElement($alexaDevice);

        return $this;
    }

    /**
     * @return Collection<int, AlexaUserValue>
     */
    public function getUserValues(): Collection
    {
        return $this->userValues;
    }

    public function addUserValue(AlexaUserValue $alexaUserValue): static
    {
        if (!$this->userValues->contains($alexaUserValue)) {
            $this->userValues->add($alexaUserValue);
//            $alexaUserValue->setAlexaUser($this);
        }
        return $this;
    }

    public function removeUserValue(AlexaUserValue $alexaUserValue): static
    {
        $this->userValues->removeElement($alexaUserValue);

        return $this;
    }

    public function __toString(): string
    {
        return __METHOD__;
    }
}
