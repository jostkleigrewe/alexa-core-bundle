<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaDeviceRepository;

#[ORM\Entity(repositoryClass: AlexaDeviceRepository::class)]
#[ORM\Table(name: "alexa_device")]
class AlexaDevice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $deviceId = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: AlexaUser::class, inversedBy: 'alexaDevices')]
    private Collection $alexaUsers;

    public function __construct() {
        $this->alexaUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    public function setDeviceId(string $deviceId): static
    {
        $this->deviceId = $deviceId;

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

    /**
     * @return Collection<int, AlexaUser>
     */
    public function getAlexaUsers(): Collection
    {
        return $this->alexaUsers;
    }

    /**
     * @param AlexaUser $alexaUser
     * @return $this
     */
    public function addAlexaUser(AlexaUser $alexaUser): static
    {
        if (!$this->alexaUsers->contains($alexaUser)) {
            $this->alexaUsers->add($alexaUser);
        }

        return $this;
    }

    public function removeAlexaUser(AlexaUser $alexaUser): static
    {
        if ($this->alexaUsers->removeElement($alexaUser)) {
            $alexaUser->removeAlexaDevice($this);
        }

        return $this;
    }

    public function __toString()
    {
        return __METHOD__;
    }
}
