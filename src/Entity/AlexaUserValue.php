<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AlexaUserValue
 *
 * @ORM\Entity(repositoryClass="Jostkleigrewe\AlexaCoreBundle\Repository\AlexaUserValueRepository")
 * @ORM\Table(name="alexa_user_value")
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Entity
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class AlexaUserValue
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @var AlexaUser $alexaUser
     * @ORM\ManyToOne(targetEntity="Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser", inversedBy="userValues")
     */
    private $alexaUser;

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

    /**
     * @return AlexaUser
     */
    public function getAlexaUser(): AlexaUser
    {
        return $this->alexaUser;
    }

    /**
     * @param AlexaUser $alexaUser
     * @return AlexaUserValue
     */
    public function setAlexaUser(AlexaUser $alexaUser): AlexaUserValue
    {
        $this->alexaUser = $alexaUser;
        return $this;
    }
##
    public function __toString()
    {
        return __METHOD__;
    }
}
