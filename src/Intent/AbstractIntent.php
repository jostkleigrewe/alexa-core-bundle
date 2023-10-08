<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent;

use Jostkleigrewe\AlexaCoreBundle\IntentSlot\RequiredSlot;
use Jostkleigrewe\AlexaCoreBundle\Manager\AlexaCoreManager;
use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;
use Jostkleigrewe\AlexaCoreBundle\Workflow\Service\AbstractWorkflowService;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Workflow\Registry;
use Jostkleigrewe\AlexaCoreBundle\Exception\AlexaCoreException;


/**
 * Class AbstractIntent
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
abstract class AbstractIntent extends AbstractWorkflowService implements IntentInterface
{

    const VALID_INTENTS = [];
    const IS_FALLBACK = false;
    const WORKFLOW = 'unknown';

    /**
     * @var AlexaCoreManager $manager
     */
    private $manager;

    /**
     * @var ArrayCollection|RequiredSlot[] $intentSlots
     */
    private $intentSlots;

    /**
     * AbstractIntent constructor.
     *
     * @param AlexaCoreManager $alexaCoreManager
     * @param Registry $workflowRegistry
     */
    public function __construct(
        AlexaCoreManager $alexaCoreManager,
        Registry $workflowRegistry
    ) {
        $this->manager = $alexaCoreManager;
        $this->intentSlots = new ArrayCollection();
        parent::__construct($workflowRegistry);
    }

    /**
     * @return bool|mixed
     * @throws AlexaCoreException
     */
    abstract protected function createResponse();

    /**
     * {@inheritdoc}
     * @see IntentInterface::execute()
     */
    final public function execute(): void
    {
        $this->createResponse();
    }

    /**
     * {@inheritdoc}
     * @see IntentInterface::execute()
     */
//    private function populateSlots(): void
//    {
//        foreach ($this->getManager()->getAlexaRequest()->getRequest()->getIntent()->getSlots() as $requestSlot) {
//            $slot = new RequiredSlot($requestSlot->getName());
//            $this->setIntentSlot($slot);
//        }
//    }


    /**
     * {@inheritdoc}
     * @see IntentInterface::isValidForRequest()
     */
    public function isValidForRequest(AlexaRequest $alexaRequest): bool
    {
        $intentRequestName = $alexaRequest->getRequest()->getIntent() ?
            $alexaRequest->getRequest()->getIntent()->getName() : $alexaRequest->getRequest()->getType();

        return $this->isValidByName($intentRequestName);
    }

    /**
     * {@inheritdoc}
     * @see IntentInterface::isValidByName()
     */
    public function isValidByName(string $intentRequestName): bool
    {
        return (
            in_array($intentRequestName, static::VALID_INTENTS) ||
            $this->getShortClassName() === $intentRequestName
        );
    }

    /**
     * {@inheritdoc}
     * @see IntentInterface::isFallback()
     */
    public function isFallback(): bool
    {
        return static::IS_FALLBACK;
    }


    /**
     * @return AlexaCoreManager
     */
    protected  function getManager(): AlexaCoreManager
    {
        return $this->manager;
    }

    /**
     * @return AlexaRequest
     * @throws AlexaCoreException
     */
    protected function getAlexaRequest(): AlexaRequest
    {
        return $this->getManager()->getAlexaRequest();
    }

    /**
     * @return AlexaResponse
     * @throws AlexaCoreException
     */
    protected function getAlexaResponse(): AlexaResponse
    {
        return $this->getManager()->getAlexaResponse();
    }

    /**
     * @return string
     */
    protected function getShortClassName(): string
    {
        $className = static::class;
        $pos = strrpos($className, '\\');
        return substr($className, $pos + 1);
    }

    /**
     * @return RequiredSlot[]|ArrayCollection
     */
    public function getIntentSlots()
    {
        return $this->intentSlots;
    }

    /**
     * @param string $slotName
     * @return RequiredSlot|null
     */
    public function getIntentSlot(string $slotName): ?RequiredSlot
    {
        return $this->intentSlots->offsetGet($slotName);
    }

    /**
     * @param RequiredSlot $slot
     * @return $this
     */
    public function addIntentSlot(RequiredSlot $slot): self
    {
        $this->intentSlots->offsetSet($slot->getSlotName(), $slot);
        return $this;
    }
}