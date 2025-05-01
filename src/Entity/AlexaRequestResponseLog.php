<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaRequestResponseLogRepository;
use Symfony\Component\Validator\Constraints as Assert;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: AlexaRequestResponseLogRepository::class)]
#[ORM\Table(name: "alexa_request_response_log")]
#[ORM\HasLifecycleCallbacks]
class AlexaRequestResponseLog
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36, unique: true)]
    private string $id;

    #[ORM\Column(type: 'string', length: 10)]
    private string $requestMethod;

    #[ORM\Column(type: 'string', length: 255)]
    private string $requestPath;

    #[ORM\Column(type: 'json')]
    private array $requestHeaders;

    #[ORM\Column(type:'json')]
    private array $request;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $responseStatusCode = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $responseHeaders = null;

    #[ORM\Column(type:'json', nullable: true)]
    private ?array $response = null;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $updatedAt;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getRequestMethod(): string
    {
        return $this->requestMethod;
    }

    public function setRequestMethod(string $requestMethod): static
    {
        $this->requestMethod = $requestMethod;
        return $this;
    }

    public function getRequestPath(): string
    {
        return $this->requestPath;
    }

    public function setRequestPath(string $requestPath): static
    {
        $this->requestPath = $requestPath;
        return $this;
    }

    public function getRequestHeaders(): array
    {
        return $this->requestHeaders;
    }

    public function setRequestHeaders(array $requestHeaders): static
    {
        $this->requestHeaders = $requestHeaders;
        return $this;
    }

    public function getRequest(): array
    {
        return $this->request;
    }

    public function setRequest(array $request): AlexaRequestResponseLog
    {
        $this->request = $request;
        return $this;
    }

    public function getResponseStatusCode(): ?int
    {
        return $this->responseStatusCode;
    }

    public function setResponseStatusCode(?int $responseStatusCode): AlexaRequestResponseLog
    {
        $this->responseStatusCode = $responseStatusCode;
        return $this;
    }

    public function getResponseHeaders(): ?array
    {
        return $this->responseHeaders;
    }

    public function setResponseHeaders(array $responseHeaders): AlexaRequestResponseLog
    {
        $this->responseHeaders = $responseHeaders;
        return $this;
    }

    public function getResponse(): ?array
    {
        return $this->response;
    }

    public function setResponse(?array $response): AlexaRequestResponseLog
    {
        $this->response = $response;
        return $this;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): void
    {
        $this->createdAt = new DateTime();
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setUpdatedAt(): void
    {
        $this->updatedAt = new DateTime();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return __METHOD__;
    }
}
