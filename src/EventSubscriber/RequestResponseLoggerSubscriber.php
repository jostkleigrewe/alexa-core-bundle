<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\EventSubscriber;

use Doctrine\ORM\EntityManagerInterface;
use Jostkleigrewe\AlexaCoreBundle\Controller\RequestResponseLoggerInterface;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaRequestResponseLog;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Uid\Uuid;

class RequestResponseLoggerSubscriber implements EventSubscriberInterface
{
    private bool $loggingEnabled = false;

    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
            KernelEvents::RESPONSE => 'onResponse',
        ];
    }

    /**
     * Prüft, ob der Controller das LoggableControllerInterface implementiert.
     */
    public function onKernelController(ControllerEvent $event): void
    {
        $controller = $event->getController();

        // aboart, if closure
        if (!is_array($controller)) {
            return;
        }

        //  has interface
        if ($controller[0] instanceof RequestResponseLoggerInterface) {
            // Logging aktivieren
            $request = $event->getRequest();
            $request->attributes->set('logging_enabled', true);

            // Generiere eine UUID und speichere sie im Request
            $requestId = Uuid::v4();
            $request->attributes->set('request_uuid', $requestId);

            $this->loggingEnabled = true;

            // Speichere den Request in der Datenbank
            $logEntry = new AlexaRequestResponseLog();
            $logEntry
                ->setId($requestId->toString())
                ->setRequestMethod($request->getMethod())
                ->setRequestPath($request->getPathInfo())
                ->setRequestHeaders($request->headers->all())
                ->setRequest(json_decode($request->getContent(), true) ?? [])
            ;

            $this->entityManager->persist($logEntry);
            $this->entityManager->flush();
        }
    }

    public function onResponse(ResponseEvent $event): void
    {
        if (!$this->loggingEnabled) {
            return;
        }

        $request = $event->getRequest();
        $response = $event->getResponse();
        $requestUuid = $request->attributes->get('request_uuid');

        if (!$requestUuid) {
            return;
        }

        $logEntry = $this->entityManager->getRepository(AlexaRequestResponseLog::class)->find($requestUuid);
        if ($logEntry) {
            $logEntry
                ->setResponseStatusCode($response->getStatusCode())
                ->setResponseHeaders($response->headers->all())
                ->setResponse(json_decode($response->getContent(), true) ?? [])
            ;
            $this->entityManager->flush();
        }
    }
}
