<?php

namespace Jostkleigrewe\AlexaCoreBundle\EventSubscriber;

use Jostkleigrewe\AlexaCoreBundle\Service\AlexaResponseSerializer;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaResponseService;
use Jostkleigrewe\AlexaCoreBundle\Controller\ReturnJsonOnBadRequestInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Event Subscriber, um im Fehlerfall eine strukturierte JSON-Antwort an Alexa zurückzugeben.
 *
 * Diese Klasse prüft, ob der Controller ein ReturnJsonOnBadRequestInterface implementiert. Wenn ja,
 * und es während der Ausführung zu einer Exception kommt, wird eine strukturierte JSON-Antwort zurückgegeben.
 */
readonly class ReturnJsonOnBadRequestSubscriber implements EventSubscriberInterface
{
     /**
     * Konstruktor mit Abhängigkeiten.
     */
    public function __construct(
        private AlexaResponseService    $alexaResponseService,
        private AlexaResponseSerializer $serializer,
        private LoggerInterface         $logger,
    ) {}

    /**
     * Registriert die Events, auf die dieser Subscriber horcht.
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => ['onKernelController', 0],
            KernelEvents::EXCEPTION  => ['onKernelException', 0],
        ];
    }

    /**
     * Markiert den Request, damit im Fehlerfall JSON zurückgegeben wird.
     */
    public function onKernelController(ControllerEvent $event): void
    {
        $controller = $event->getController();
        // Wenn der Controller das ReturnJsonOnBadRequestInterface implementiert,
        // setzen wir ein Attribut im Request, damit wir im Fehlerfall wissen:
        // "Dieser Controller möchte eine JSON-Antwort.".
        if (is_array($controller) && $controller[0] instanceof ReturnJsonOnBadRequestInterface) {
            $event->getRequest()->attributes->set('_return_json_bad_request', true);
        }
    }

    /**
     * Fängt Exceptions ab und gibt eine strukturierte JSON-Antwort zurück, falls der Request "markiert" ist.
     */
    public function onKernelException(ExceptionEvent $event): void
    {
        $request = $event->getRequest();
        // Nur weiterverfahren, wenn das Request-Attribut gesetzt wurde.
        if (!$request->attributes->get('_return_json_bad_request')) {
            return;
        }

        // Throwable holen
        $throwable = $event->getThrowable();

        // Logge den Fehler, damit wir ihn in der Logdatei haben.
        // Je nach Bedarf kann man hier ggf. differenzieren, ob man Info/Warning/Error loggt.
        $this->logger->error(sprintf('[ReturnJsonOnBadRequestSubscriber] %s: %s', get_class($throwable), $throwable->getMessage()), [
            'file' => $throwable->getFile(),
            'line' => $throwable->getLine(),
        ]);

        // Baue die JSON-Antwort anhand des Throwables.
        $response = $this->alexaResponseService->createErrorResponse($throwable);
        $jsonResponse = $this->serializer->toJsonResponse($response);
//        $jsonResponse->setStatusCode(200);

        // Setze das Ergebnis als Response.
        $event->setResponse($jsonResponse);
    }

}
