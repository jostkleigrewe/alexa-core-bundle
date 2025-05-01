<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Skill;

use Jostkleigrewe\AlexaCoreBundle\Dto\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Dto\Response\AlexaResponse;

/**
 * Class AbstractSkill
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Skill
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
abstract class AbstractSkill implements SkillInterface
{
    /**
     * AbstractSkill constructor.
     *
     * @param AlexaRequest $alexaRequest
     * @param AlexaResponse $alexaResponse
     */
    public function __construct(
        private readonly AlexaRequest $alexaRequest,
        private readonly AlexaResponse $alexaResponse
    ) {
    }

    /**
     * @return $this
     */
    abstract public function createResponse();

    /**
     * @return AlexaRequest
     */
    public function getAlexaRequest(): AlexaRequest
    {
        return $this->alexaRequest;
    }

    /**
     * @return AlexaResponse
     */
    public function getAlexaResponse(): AlexaResponse
    {
        return $this->alexaResponse;
    }
}
