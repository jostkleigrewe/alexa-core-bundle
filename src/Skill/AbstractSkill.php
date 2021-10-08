<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Skill;

use Jostkleigrewe\AlexaCoreBundle\Request\AlexaRequest;
use Jostkleigrewe\AlexaCoreBundle\Response\AlexaResponse;

/**
 * Class AbstractSkill
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Skill
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
abstract class AbstractSkill implements SkillInterface
{

    /**
     * @var AlexaRequest $alexaRequest
     */
    private $alexaRequest;

    /**
     * @var AlexaResponse $alexaResponse
     */
    private $alexaResponse;

    /**
     * AbstractSkill constructor.
     *
     * @param AlexaRequest $alexaRequest
     * @param AlexaResponse $alexaResponse
     */
    public function __construct(AlexaRequest $alexaRequest, AlexaResponse $alexaResponse)
    {
        $this->alexaRequest = $alexaRequest;
        $this->alexaResponse = $alexaResponse;
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