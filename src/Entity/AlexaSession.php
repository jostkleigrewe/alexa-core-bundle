<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AlexaSession
 *
 * @ORM\Entity(repositoryClass="Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionRepository")
 * @ORM\Table(name="alexa_session")
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Entity
 */
class AlexaSession
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @var string $sessionId
     * @ORM\Column(type="string", length=255, unique=true, nullable=false, options={"collate"="utf8_unicode_ci", "charset"="utf8"})
     */
    private $sessionId;

    /**
     * @var AlexaUser $alexaUser
     * @ORM\ManyToOne(targetEntity="Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser")
     */
    private $alexaUser;

    /**
     * @var AlexaDevice $alexaDevices
     * @ORM\ManyToOne(targetEntity="Jostkleigrewe\AlexaCoreBundle\Entity\AlexaDevice")
     */
    private $alexaDevice;

    /**
     * @var ArrayCollection|AlexaSessionValue[] $sessionValues
     * @ORM\OneToMany(targetEntity="Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSessionValue", mappedBy="alexaSession")
     */
    private $sessionValues;

    /**
     * AlexaDevice constructor.
     */
    public function __construct() {
        $this->sessionValues = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return self
     */
    public function setSessionId(string $sessionId): self
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return AlexaUser
     */
    public function getAlexaUser(): AlexaUser
    {
        return $this->alexaUser;
    }

    /**
     * @param AlexaUser $alexaUser
     * @return self
     */
    public function setAlexaUser(AlexaUser $alexaUser): self
    {
        $this->alexaUser = $alexaUser;
        return $this;
    }

    /**
     * @return AlexaDevice
     */
    public function getAlexaDevice(): AlexaDevice
    {
        return $this->alexaDevice;
    }

    /**
     * @param AlexaDevice $alexaDevice
     * @return self
     */
    public function setAlexaDevice(AlexaDevice $alexaDevice): self
    {
        $this->alexaDevice = $alexaDevice;
        return $this;
    }

    /**
     * @return AlexaSessionValue[]|ArrayCollection
     */
    public function getSessionValues()
    {
        return $this->sessionValues;
    }

    /**
     * @param AlexaSessionValue[]|ArrayCollection $sessionValues
     * @return self
     */
    public function setSessionValues($sessionValues): self
    {
        $this->sessionValues = $sessionValues;
        return $this;
    }

    public function __toString()
    {
        return __METHOD__;
    }
}
