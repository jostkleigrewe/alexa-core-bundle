<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class AlexaResponseService
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class AlexaResponseService
{
    private ?AlexaResponse $alexaResponse;

    /**
     * AlexaResponseService constructor.
     *
     * @param SerializerInterface $serializer
     * @param AlexaRequestService $alexaRequestService
     */
    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly AlexaRequestService $alexaRequestService
    ) {
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
    public function createAlexaResponseByAlexaRequest(AlexaRequest $alexaRequestDto): AlexaResponse
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

        if ($e->getPrevious()) {
            $alexaResponse->getResponse()->getCard()
                ->addText(
                    ' Vorausgegangen ist ein Fehler in der Datei ' . basename($e->getPrevious()->getFile()) .
                    ', Zeile ' . $e->getPrevious()->getLine() .
                    ', aufgetreten: ' . $e->getPrevious()->getMessage()
                );
        }

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