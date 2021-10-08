<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;
use Jostkleigrewe\AlexaCoreBundle\Manager\AlexaCoreManager;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class AlexaCoreService
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Service
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaCoreService
{

    /**
     * @var AlexaCoreManager $alexaCoreManager
     */
    private $alexaCoreManager;

    /**
     * AlexaCoreService constructor.
     *
     * @param AlexaCoreManager $alexaCoreManager
     */
    public function __construct(
        AlexaCoreManager $alexaCoreManager
    ) {
        $this->alexaCoreManager = $alexaCoreManager;
    }

    /**
     * Create a alexa-response
     *
     * @return JsonResponse
     * @throws AlexaCoreException
     */
    public function getResponse(): JsonResponse
    {
        try {

            $session = $this->getAlexaCoreManager()->getAlexaSession();

            //  get intent by symfony-request
            $intent = $this->getAlexaCoreManager()->getIntentService()->getIntent();

            //  execute intent
            $this->getAlexaCoreManager()
                ->getIntentService()
                    ->executeIntent($intent)
            ;
        }
        catch (\Throwable $e) {

            //  create new response by throwable
            $this->getAlexaCoreManager()
                ->getAlexaResponseService()
                    ->updateAlexaResponseByThrowable($e);
        }

        //  get response-object
        $alexaResponse = $this->getAlexaCoreManager()->getAlexaResponse();

        //  create and return json-response
        return $this->getAlexaCoreManager()
            ->getAlexaResponseService()
                ->createJsonResponseByAlexaResponse($alexaResponse);
    }

    /**
     * @return AlexaCoreManager
     */
    private function getAlexaCoreManager(): AlexaCoreManager
    {
        return $this->alexaCoreManager;
    }
}