<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Workflow\Service;

use Jostkleigrewe\AlexaCoreBundle\Workflow\Place\WorkflowPlaceInterface;
use Symfony\Component\Workflow\Registry;
use Symfony\Component\Workflow\Workflow;

/**
 * Class AbstractService
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Workflow\Service
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
abstract class AbstractWorkflowService implements WorkflowServiceInterface
{

    const WORKFLOW_NAME = 'unknown';

    /**
     * @var Registry
     */
    private $workflowRegistry;

    public function __construct(Registry $workflowRegistry)
    {
        $this->workflowRegistry = $workflowRegistry;
    }

    /**
     * @return Registry
     */
    public function getWorkflowRegistry(): Registry
    {
        return $this->workflowRegistry;
    }


    /**
     * @param WorkflowPlaceInterface $place
     * @return Workflow
     */
    public function getWorkflowByPlace(WorkflowPlaceInterface $place, ?string $name = null): Workflow
    {
        return $this->workflowRegistry->get($place, $name ?? static::WORKFLOW_NAME);
    }
}