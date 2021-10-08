<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Jostkleigrewe\AlexaCoreBundle\Repository\AlexaRequestResponseLogRepository")
 * @ORM\Table(name="alexa_request_response_log")
 */
class AlexaRequestResponseLog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $request
     * @ORM\Column(type="text")
     */
    private $request;

    /**
     * @var string $response
     * @ORM\Column(type="text")
     */
    private $response;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return AlexaRequestResponseLog
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequest(): string
    {
        return $this->request;
    }

    /**
     * @param string $request
     * @return AlexaRequestResponseLog
     */
    public function setRequest(string $request): AlexaRequestResponseLog
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponse(): string
    {
        return $this->response;
    }

    /**
     * @param string $response
     * @return AlexaRequestResponseLog
     */
    public function setResponse(string $response): AlexaRequestResponseLog
    {
        $this->response = $response;
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
