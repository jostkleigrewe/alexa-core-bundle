<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity(repositoryClass="Jostkleigrewe\AlexaCoreBundle\Repository\AlexaUserRepository")
 * @ORM\Table(name="alexa_user")
 */
class AlexaUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $alexaId
     * @ORM\Column(type="string", length=255, unique=true, nullable=false, options={"collate"="utf8_unicode_ci", "charset"="utf8"})
     */
    private $alexaId;

    /**
     * @var string $name
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string $password
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $password;

    /**
     * @var string $role
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $role;

    /**
     * @var PersistentCollection $alexaDevices
     * @ORM\ManyToMany(targetEntity="Jostkleigrewe\AlexaCoreBundle\Entity\AlexaDevice", mappedBy="alexaUsers")
     */
    private $alexaDevices;

    /**
     * @var ArrayCollection|AlexaUserValue[] $userValues
     * @ORM\OneToMany(targetEntity="Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUserValue", mappedBy="alexaUser")
     */
    private $userValues;

    /**
     * AlexaDevice constructor.
     */
    public function __construct() {
        $this->alexaDevices = new ArrayCollection();
        $this->userValues = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getAlexaId(): ?string
    {
        return $this->alexaId;
    }

    /**
     * @param string $alexaId
     * @return AlexaUser
     */
    public function setAlexaId(string $alexaId): self
    {
        $this->alexaId = $alexaId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return AlexaUser
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return AlexaUser
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return self
     */
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return PersistentCollection
     */
    public function getAlexaDevices(): PersistentCollection
    {
        return $this->alexaDevices;
    }

    /**
     * @param AlexaDevice $alexaDevice
     * @return $this
     */
    public function addAlexaDevice(AlexaDevice $alexaDevice): self
    {
        if (!$this->alexaDevices->contains($alexaDevice)) {
            $this->alexaDevices->add($alexaDevice);
        }

        return $this;
    }

    /**
     * @param AlexaDevice $alexaDevice
     * @return $this
     */
    public function removeAlexaDevice(AlexaDevice $alexaDevice): self
    {
        if ($this->alexaDevices->contains($alexaDevice)) {
            $this->alexaDevices->removeElement($alexaDevice);
        }
        return $this;
    }

    /**
     * @param PersistentCollection $alexaDevices
     * @return AlexaUser
     */
    public function setAlexaDevices(PersistentCollection $alexaDevices): self
    {
        $this->alexaDevices = $alexaDevices;
        return $this;
    }

    /**
     * @return AlexaUserValue[]|ArrayCollection
     */
    public function getUserValues()
    {
        return $this->userValues;
    }

    /**
     * @param AlexaUserValue[]|ArrayCollection $userValues
     * @return AlexaUser
     */
    public function setUserValues($userValues): self
    {
        $this->userValues = $userValues;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return __METHOD__;
    }
}
