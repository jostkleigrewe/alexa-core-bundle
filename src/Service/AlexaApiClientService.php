<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Repository\AlexaUserRepository;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class AlexaApiClientService
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Service
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaApiClientService
{
    public function __construct(
        private readonly HttpClientInterface $alexaClient,
    ) {
    }

    public function getToken(): string
    {
        $clientId = 'abcde';
        $clientSecret = 'abcde';

        //  send request
        $response = $this->alexaClient->request(
            'POST',
            '/auth/o2/token',
            [
                'json' => [
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'grant_type' => 'client_credentials',
                    'scope' => 'api',
                ]
            ]
        );
        $token = $response->getContent();

        return $token;
    }

}