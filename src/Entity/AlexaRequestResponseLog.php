<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaRequestResponseLogRepository;

#[ORM\Entity(repositoryClass: AlexaRequestResponseLogRepository::class)]
#[ORM\Table(name: "alexa_request_response_log")]
class AlexaRequestResponseLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type:'json')]
    private string $request;

    #[ORM\Column(type:'json')]
    private string $response;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getRequest(): string
    {
        return $this->request;
    }

    public function setRequest(string $request): static
    {
        $this->request = $request;
        return $this;
    }

    public function getResponse(): string
    {
        return $this->response;
    }

    public function setResponse(string $response): static
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
