<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\AudioPlayer;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;
use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractIntent;

class PlaybackNearlyFinished extends AbstractFallbackIntent
{
    public const array VALID_INTENTS = ['AudioPlayer.PlaybackNearlyFinished'];

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function handle(): void
    {
        $this->alexaResponse->response->clear(true);
        $this->logger->info("Playback nearly finished");
    }
}
