<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaRequestContext
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaRequestContext
{

    /**
     * @var AlexaRequestContextSystem $system
     * @Annotation\SerializedName("System")
     */
    private AlexaRequestContextSystem $system;

    /**
     * @var AlexaRequestContextViewport $viewport
     * @Annotation\SerializedName("Viewport")
     */
    private AlexaRequestContextViewport $viewport;

    /**
     * @return AlexaRequestContextSystem
     */
    public function getSystem(): AlexaRequestContextSystem
    {
        return $this->system;
    }

    /**
     * @param  AlexaRequestContextSystem $system
     * @return AlexaRequestContext
     */
    public function setSystem(AlexaRequestContextSystem $system): AlexaRequestContext
    {
        $this->system = $system;
        return $this;
    }

    /**
     * @return AlexaRequestContextViewport
     */
    public function getViewport(): AlexaRequestContextViewport
    {
        return $this->viewport;
    }

    /**
     * @param  AlexaRequestContextViewport $viewport
     * @return AlexaRequestContext
     */
    public function setViewport(AlexaRequestContextViewport $viewport): AlexaRequestContext
    {
        $this->viewport = $viewport;
        return $this;
    }
}