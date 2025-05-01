<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\Fallback;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;

/**
 * Class DefaultFallback
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Intent\Fallback
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class DefaultFallback extends AbstractFallbackIntent
{
    /**
     * {@inheritDoc}
     * @see AbstractIntent::handle()
     */
    public function handle(): void
    {

        $text = 'Fallback Intent';

        $this->alexaResponse->response->outputSpeech->setText($text);
    }
}
