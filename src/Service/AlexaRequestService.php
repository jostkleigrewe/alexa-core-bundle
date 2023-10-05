<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequest;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class AlexaRequestService
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Service
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaRequestService
{

    const REQUEST_FORMAT = 'json';

    /**
     * @var SerializerInterface $serializer
     */
    private $serializer;

    /**
     * @var RequestStack $requestStack;
     */
    private $requestStack;

    /**
     * @var AlexaRequest $alexaRequest
     */
    private $alexaRequest;

    /**
     * AlexaCoreManager constructor.
     *
     * @param SerializerInterface    $serializer
     * @param RequestStack           $requestStack
     */
    public function __construct(
        SerializerInterface $serializer,
        RequestStack $requestStack
    ) {
        $this->serializer = $serializer;
        $this->requestStack = $requestStack;
    }

    /**
     * get current alexa-request
     *
     * @return AlexaRequest
     * @throws AlexaCoreException
     */
    public function getAlexaRequest(): AlexaRequest
    {
        if ($this->alexaRequest === null) {
            $this->alexaRequest = $this->createAlexaRequestBySymfonyRequest();
        }

        return $this->alexaRequest;
    }

    /**
     * get type of current alexa-request
     *
     * @return string
     * @throws AlexaCoreException
     */
    public function getRequestType(): string
    {
        return $this->getAlexaRequest()->getRequest()->getType();
    }

    /**
     * Deserialize json-string and return a populated alexa-request
     *
     * @param string $json
     * @return AlexaRequest
     * @throws AlexaCoreException
     */
    public function createAlexaRequestByJsonString(string $json): AlexaRequest
    {
        if ($this->alexaRequest === null)
        {
            try {
                $alexaRequest = $this->serializer->deserialize(
                    $json,
                    AlexaRequest::class,
                    self::REQUEST_FORMAT
                );
                /** @var AlexaRequest $alexaRequest */
            }
            catch (\Throwable $e) {
                throw new AlexaCoreException(
                    'Error occured while deserializing symfony-request to polulate alexa-request.',
                    0,
                    $e
                );
            }

            //  set as current alexa-request
            $this->alexaRequest = $alexaRequest;
        }

        return $this->alexaRequest;
    }

    /**
     * create alexa-request by symfony-request
     *
     * @return AlexaRequest
     * @throws AlexaCoreException
     */
    public function createAlexaRequestBySymfonyRequest(): AlexaRequest
    {
        return $this->createAlexaRequestByJsonString($this->getSymfonyRequest()->getContent());
    }

    /**
     * @return Request
     */
    private function getSymfonyRequest(): Request
    {
        $currentRequest = $this->requestStack->getCurrentRequest();

        if ($currentRequest === null) {
            throw new \LogicException('Current symfony-request is missing');
        }

        return $currentRequest;
    }
}