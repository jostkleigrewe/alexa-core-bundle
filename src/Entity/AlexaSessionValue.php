<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AlexaSessionValue
 *
 * @ORM\Entity(repositoryClass="Jostkleigrewe\AlexaCoreBundle\Repository\AlexaSessionValueRepository")
 * @ORM\Table(name="alexa_session_value")
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Entity
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class AlexaSessionValue
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @var AlexaUser $alexaSession
     * @ORM\ManyToOne(targetEntity="Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession", inversedBy="sessionValues")
     */
    private $alexaSession;

    /**
     * @var string $key
     * @ORM\Column(type="string", length=255, unique=true, nullable=false, options={"collate"="utf8_unicode_ci", "charset"="utf8"})
     */
    private $key;

    /**
     * @var string $value
     * @ORM\Column(type="text")
     */
    private $value;

    /**
     * AlexaDevice constructor.
     */
    public function __construct() {

    }

    /**
     * @return AlexaUser
     */
    public function getAlexaSession(): AlexaUser
    {
        return $this->alexaSession;
    }

    /**
     * @param AlexaUser $alexaSession
     * @return self
     */
    public function setAlexaSession(AlexaUser $alexaSession): self
    {
        $this->alexaSession = $alexaSession;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function __toString()
    {
        return __METHOD__;
    }
}
