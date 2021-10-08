<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Jostkleigrewe\AlexaCoreBundle\Repository\AlexaDeviceRepository")
 * @ORM\Table(name="alexa_device")
 */
class AlexaDevice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false, options={"collate"="utf8_unicode_ci", "charset"="utf8"})
     */
    private $deviceId;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser", inversedBy="alexaDevices")
     * @ORM\JoinTable(name="alexa_users_devices")
     */
    private $alexaUsers;

    /**
     * AlexaDevice constructor.
     */
    public function __construct() {
        $this->alexaUsers = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * @param string $deviceId
     * @return AlexaDevice
     */
    public function setDeviceId(string $deviceId): self
    {
        $this->deviceId = $deviceId;

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
     * @return mixed
     */
    public function getAlexaUsers()
    {
        return $this->alexaUsers;
    }

    /**
     * @param AlexaUser $alexaUser
     * @return $this
     */
    public function addAlexaUser(AlexaUser $alexaUser)
    {
        if (!$this->alexaUsers->contains($alexaUser)) {
            $this->alexaUsers->add($alexaUser);
        }

        return $this;
    }

    /**
     * @param AlexaUser $alexaUser
     * @return $this
     */
    public function removeAlexaUser(AlexaUser $alexaUser)
    {
        if ($this->alexaUsers->contains($alexaUser)) {
            $this->alexaUsers->removeElement($alexaUser);
        }
        return $this;
    }

    /**
     * @param mixed $alexaUsers
     * @return AlexaDevice
     */
    public function setAlexaUsers($alexaUsers)
    {
        $this->alexaUsers = $alexaUsers;
        return $this;
    }

    public function __toString()
    {
        return __METHOD__;
    }
}
