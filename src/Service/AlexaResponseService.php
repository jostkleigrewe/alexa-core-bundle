<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class AlexaResponseService
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Service
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class AlexaResponseService
{

    /**
     * @var SerializerInterface $serializer
     */
    private $serializer;

    /**
     * @var AlexaResponse $alexaResponse
     */
    private $alexaResponse;

    /**
     * @var AlexaRequestService $alexaRequestService
     */
    private $alexaRequestService;

    /**
     * AlexaResponseService constructor.
     *
     * @param SerializerInterface $serializer
     * @param AlexaRequestService $alexaRequestService
     */
    public function __construct(
        SerializerInterface $serializer,
        AlexaRequestService $alexaRequestService
    ) {
        $this->serializer = $serializer;
        $this->alexaRequestService = $alexaRequestService;
    }

    /**
     * @return AlexaResponse
     * @throws AlexaCoreException
     */
    public function getAlexaResponse(): AlexaResponse
    {
        if ($this->alexaResponse === null) {
            $this->alexaResponse = $this->createAlexaResponseBySymfonyRequest();
        }

        return $this->alexaResponse;
    }

    /**
     * @return AlexaResponse
     * @throws AlexaCoreException
     */
    public function createAlexaResponseBySymfonyRequest(): AlexaResponse
    {
        $alexaRequest = $this->getAlexaRequestService()->getAlexaRequest();

        return $this->createAlexaResponseByAlexaRequest($alexaRequest);
    }

    /**
     * @param AlexaRequest $alexaRequest
     * @return AlexaResponse
     */
    public function createAlexaResponseByAlexaRequest(AlexaRequest $alexaRequest): AlexaResponse
    {
        return new AlexaResponse();
    }

    /**
     * Create a alexa-response from a throwable
     *
     * @param \Throwable $e
     * @return void
     */
    public function updateAlexaResponseByThrowable(\Throwable $e): void
    {
        $this->alexaResponse = $this->createAlexaResponseByThrowable($e);
    }

    /**
     * Create a alexa-response from a throwable
     *
     * @param \Throwable $e
     * @return AlexaResponse
     */
    public function createAlexaResponseByThrowable(\Throwable $e): AlexaResponse
    {
        $alexaResponse = new AlexaResponse();
        $alexaResponse->getResponse()->getOutputSpeech()->setText(
            'Es ist ein Fehler in der Datei ' . basename($e->getFile()) .
            ', Zeile ' . $e->getLine() .
            ', aufgetreten: ' . $e->getMessage()
        );

        $alexaResponse->getResponse()->getCard()
            ->setTitle('Systemfehler')
            ->setText(
                'Es ist ein Fehler in der Datei ' . basename($e->getFile()) .
                ', Zeile ' . $e->getLine() .
                ', aufgetreten: ' . $e->getMessage()
            );

        $alexaResponse->setStatusCode(500);

        return $alexaResponse;
    }

    /**
     * Creates a json-response from a alexa-response
     *
     * @param AlexaResponse $alexaResponse
     * @param array         $additionalHeaders
     * @return JsonResponse
     */
    public function createJsonResponseByAlexaResponse(AlexaResponse $alexaResponse, array $additionalHeaders = []) {
        $alexaResponseSerialized = $this->serializer->serialize($alexaResponse,'json');
        $statusCode = $alexaResponse->getStatusCode();

        return JsonResponse::fromJsonString($alexaResponseSerialized, $statusCode, $additionalHeaders)
            ->setSharedMaxAge(300);
    }

    /**
     * @return AlexaRequestService
     */
    protected function getAlexaRequestService(): AlexaRequestService
    {
        return $this->alexaRequestService;
    }
}