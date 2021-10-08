<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Class AlexaResponseDebug
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Response
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class AlexaResponseDebug
{
    /**
     * @var array $messages
     *
     * @Annotation\SerializedName("messages")
     * @Annotation\Type("array<string, string>")
     */
    private $messages;

    /**
     * AlexaResponse constructor.
     */
    public function __construct()
    {
        $this->messages = array();
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function addMessage(string $value): self
    {
        $this->messages[microtime()] = $value;

        return $this;
    }
}