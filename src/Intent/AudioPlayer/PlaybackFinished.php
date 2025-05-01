<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\AudioPlayer;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

class PlaybackFinished extends AbstractFallbackIntent
{
    public const array VALID_INTENTS = ['AudioPlayer.PlaybackFinished'];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function handle(): void
    {
        $this->alexaResponse->response->clear(true);
        $this->logger->info("Playback finished");
    }
}
