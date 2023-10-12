<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Tests\Dto\Request;

use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequestContext;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequestRequest;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequestSession;
use PHPUnit\Framework\TestCase;

class AlexaRequestTest extends TestCase
{
    public function testAlexaRequest(): void
    {
        $alexaRequest = new AlexaRequest();

        // Test Version
        $version = '1.0';
        $alexaRequest->setVersion($version);
        $this->assertSame($version, $alexaRequest->getVersion());

        // Test Session
        $session = new AlexaRequestSession();
        $alexaRequest->setSession($session);
        $this->assertSame($session, $alexaRequest->getSession());

        // Test Context
        $context = new AlexaRequestContext();
        $alexaRequest->setContext($context);
        $this->assertSame($context, $alexaRequest->getContext());

        // Test Request
        $request = new AlexaRequestRequest();
        $alexaRequest->setRequest($request);
        $this->assertSame($request, $alexaRequest->getRequest());
    }
}
