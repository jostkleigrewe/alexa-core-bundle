Installation
============

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
$ composer require jostkleigrewe/alexa-core-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require jostkleigrewe/alexa-core-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Jostkleigrewe\AlexaCoreBundle\JostkleigreweAlexaCoreBundle(),
        );

        // ...
    }

    // ...
}
```




Create a new Intent
----------------------------------
Intents are service-classes that are tagged as an intent.

###Create a new Intent
To create a new service to handle an intent, please create a new class that extends "Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent".

```php
<?php
declare(strict_types = 1);

namespace App\Intent;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

/**
 * Class DoSomething
 */
class DoSomething extends AbstractIntent
{

    /**
     * @return bool
     */
    public function createResponse() {

        // ...

        return true;
    }

}
```

```php
<?php

declare(strict_types=1);

namespace App\Controller\Api\Alexa;

use Alt\AlexaCoreService;use Jostkleigrewe\AlexaCoreBundle\Controller\RequestResponseLoggerInterface;use Jostkleigrewe\AlexaCoreBundle\Controller\ReturnJsonOnBadRequestInterface;use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\UpdateRequest;use Nelmio\ApiDocBundle\Attribute\Model;use OpenApi\Attributes as OA;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;use Symfony\Component\HttpFoundation\JsonResponse;use Symfony\Component\HttpFoundation\Response;use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;use Symfony\Component\Routing\Attribute\Route;



#[OA\Tag(name: 'alexa')]
class AlexaFamilyController extends AbstractController implements
    ReturnJsonOnBadRequestInterface,
    RequestResponseLoggerInterface
{

    public function __construct(
        private readonly AlexaCoreService    $alexaCoreService,
    ) {
        // ...
    }


    /**
     * Verarbeitet eine Alexa-Anfrage für den Family-Endpunkt.
     *
     * Diese Methode nimmt eine JSON-basierte Anfrage von Alexa entgegen, überprüft die Gültigkeit und
     * stellt sicher, dass die Anfrage validiert wird. Bei erfolgreicher Verarbeitung wird eine JSON-Antwort zurückgegeben.
     *
     * @param AlexaRequest $alexaRequest Die strukturierte Anfrage von Alexa, die vorher als JSON übergeben wurde.
     *
     * @return JsonResponse JSON-Antwort, die basierend auf der Anfrage erzeugt wurde.
     *
     * @throws AlexaCoreException
     */
    #[Route('/api/alexa/family', name: 'api_alexa_family', methods: ['POST'])]
    #[OA\Post(
        description: 'Verarbeitet eine Alexa-Anfrage für den Family-Endpunkt.',
        summary: "Empfangen von Alexa Family Request",
        requestBody: new OA\RequestBody(
            description: 'Alexa Request DTO',
            required: true,
            content: new OA\JsonContent(
                ref: new Model(type: AlexaRequest::class)
            ),
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Erfolgreiche Antwort',
                content: new OA\JsonContent(
                    ref: new Model(type: AlexaResponse::class)
                )
            ),
            new OA\Response(
                response: 400,
                description: 'Fehlerhafte Anfrage',
                content: new OA\JsonContent(
                    ref: new Model(type: AlexaResponse::class)
                )
            )
        ]
    )]
    public function handleFamilyRequest(
        #[MapRequestPayload(
            acceptFormat: 'json',
            validationFailedStatusCode: Response::HTTP_UNPROCESSABLE_ENTITY
        )] AlexaRequest $alexaRequest,
    ): JsonResponse
    {
        return $this->alexaCoreService->getJsonResponseByAlexaRequest($alexaRequest);
    }

    /**
     * Verarbeitet eine Alexa-Testanfrage.
     *
     * Diese Methode nimmt eine JSON-basierte Testanfrage von Alexa entgegen und führt eine Validierung basierend
     * auf den spezifizierten Validator-Gruppen durch. Bei erfolgreicher Prüfung wird die Anfrage in JSON-Format zurückgegeben.
     *
     * @param AlexaRequest $alexaRequest Die strukturierte Testanfrage von Alexa, die als JSON übergeben und validiert wurde.
     *
     * @return JsonResponse Die validierte Testanfrage im JSON-Format.
     */
    #[Route('/api/alexa/test', name: 'api_alexa_test', methods: ['POST'])]
    public function handleTestRequest(
        #[MapRequestPayload(
            acceptFormat: 'json',
            validationGroups: ['strict'],
            validationFailedStatusCode: Response::HTTP_UNPROCESSABLE_ENTITY
        )] AlexaRequest $alexaRequest,
    ): JsonResponse
    {
        return $this->json($alexaRequest);
    }
}
```