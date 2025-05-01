<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Intent\AudioPlayer;

use Jostkleigrewe\AlexaCoreBundle\Intent\AbstractFallbackIntent;

class PlaybackFailed extends AbstractFallbackIntent
{
    public const array VALID_INTENTS = ['AudioPlayer.PlaybackFailed'];

    public function handle(): void
    {
        $this->alexaResponse->response->clear(true);
        $this->logger->info("Playback failed");
    }
}
