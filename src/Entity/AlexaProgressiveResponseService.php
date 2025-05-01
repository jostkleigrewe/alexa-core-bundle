<?php

namespace Jostkleigrewe\AlexaCoreBundle\Entity;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class AlexaProgressiveResponseService
{
    private const API_URL_TEMPLATE = 'https://api.amazonalexa.com/v1/directives';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly ParameterBagInterface $params,
    ) {
    }

    public function sendProgressiveResponse(string $requestId, string $speechText, string $accessToken): void
    {
        $this->httpClient->request('POST', self::API_URL_TEMPLATE, [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'header' => ['requestId' => $requestId],
                'directive' => ['type' => 'VoicePlayer.Speak', 'speech' => $speechText],
            ],
        ]);
    }
}
