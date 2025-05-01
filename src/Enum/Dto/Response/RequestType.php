<?php

namespace Jostkleigrewe\AlexaCoreBundle\Enum\Dto\Response;

enum RequestType: string
{
    // Standard Requests
    case LaunchRequest = 'LaunchRequest';  // Wenn der Benutzer die Skill startet, ohne eine spezifische Intent-Angabe
    case IntentRequest = 'IntentRequest';  // Wenn der Benutzer eine Anfrage stellt, die einer definierten Intent entspricht
    case SessionEndedRequest = 'SessionEndedRequest';  // Wenn die aktuelle Alexa-Session beendet wird
    case CanFulfillIntentRequest = 'CanFulfillIntentRequest';  // Abfrage, ob der Skill eine bestimmte Absicht erfüllen kann

    // AudioPlayer Interface Requests
    case PlaybackStarted = 'AudioPlayer.PlaybackStarted';  // Wiedergabe wurde gestartet
    case PlaybackFinished = 'AudioPlayer.PlaybackFinished';  // Wiedergabe wurde abgeschlossen
    case PlaybackStopped = 'AudioPlayer.PlaybackStopped';  // Wiedergabe wurde gestoppt
    case PlaybackNearlyFinished = 'AudioPlayer.PlaybackNearlyFinished';  // Wiedergabe nähert sich dem Ende
    case PlaybackFailed = 'AudioPlayer.PlaybackFailed';  // Fehler bei der Wiedergabe

    // PlaybackController Interface Requests
    case PlayCommandIssued = 'PlaybackController.PlayCommandIssued';  // Benutzer fordert Wiedergabe an
    case PauseCommandIssued = 'PlaybackController.PauseCommandIssued';  // Benutzer fordert Pause an
    case NextCommandIssued = 'PlaybackController.NextCommandIssued';  // Benutzer fordert "Nächster" an
    case PreviousCommandIssued = 'PlaybackController.PreviousCommandIssued';  // Benutzer fordert "Vorheriger" an

    // APL Interface Requests (Alexa Presentation Language)
    case UserEvent = 'Alexa.Presentation.APL.UserEvent';  // Benutzerinteraktion mit der APL-Schnittstelle

    // Messaging Interface Requests
    case MessageReceived = 'Messaging.MessageReceived';  // Empfang einer Nachricht

    // Connections Interface Requests
    case ConnectionsResponse = 'Connections.Response';  // Antwort auf eine Anfrage über das Connections Interface

    // Weitere spezielle Requests
    case SystemExceptionEncountered = 'System.ExceptionEncountered';  // Fehlerbericht von Alexa
}
