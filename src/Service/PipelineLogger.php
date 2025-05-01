<?php

namespace Jostkleigrewe\AlexaCoreBundle\Service;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;

class PipelineLogger extends AbstractLogger
{
    /**
     * Interne Speicherung der Logeinträge.
     *
     * @var array
     */
    private array $logEntries = [];

    /**
     * Ein einheitliches Prefix, das vor jede Logmeldung gesetzt wird.
     *
     * @var string
     */
    private string $prefix;

    /**
     * PipelineLogger constructor.
     *
     * @param LoggerInterface $innerLogger Der zugrunde liegende Logger, an den die Meldungen weitergeleitet werden.
     * @param string $prefix Das gewünschte Prefix für alle Logeinträge.
     */
    public function __construct(
        private readonly LoggerInterface $innerLogger,
        string                           $prefix = '[AlexaBundle]'
    ) {
        $this->prefix = $prefix;
    }

    /**
     * Loggt eine Nachricht und speichert sie intern.
     *
     * Zusätzlich wird mittels debug_backtrace() ermittelt, aus welcher Klasse/Funktion der Log-Aufruf erfolgt.
     *
     * @param mixed  $level   Log-Level (z. B. info, debug, error)
     * @param string $message Die eigentliche Lognachricht.
     * @param array  $context Kontextinformationen.
     */
    public function log($level, $message, array $context = []): void
    {
        // Ermittle den Aufrufer, der nicht direkt aus dieser Klasse stammt.
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);
        // Versuche, den passenden Frame zu finden. Falls vorhanden, verwenden wir Frame 2, ansonsten Frame 1.
        $caller = $trace[2] ?? ($trace[1] ?? []);
        $callerInfo = '';
        if (!empty($caller)) {
            if (isset($caller['class'])) {
                $className = $caller['class'];
                // Entferne den führenden Namespace "Jostkleigrewe\AlexaCoreBundle\" falls vorhanden.
                $prefixToRemove = 'Jostkleigrewe\\AlexaCoreBundle\\';
                if (str_starts_with($className, $prefixToRemove)) {
                    $className = substr($className, strlen($prefixToRemove));
                }
                $callerInfo .= $className;
            }
            if (isset($caller['function'])) {
                $callerInfo .= '::' . $caller['function'];
            }
        }
        // Erstelle die Lognachricht mit Prefix und Caller-Info.
        $fullMessage = sprintf('%s %s - %s', $this->prefix, $callerInfo, $message);

        $entry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'level'     => $level,
            'message'   => $fullMessage,
            'context'   => $context,
        ];
        $this->logEntries[] = $entry;

        // Weiterleiten an den inneren Logger.
        $this->innerLogger->log($level, $fullMessage, $context);
    }

    /**
     * Gibt alle gesammelten Logeinträge zurück.
     *
     * @return array
     */
    public function getLogEntries(): array
    {
        return $this->logEntries;
    }

    /**
     * Löscht die internen Logeinträge – nützlich pro Request.
     */
    public function clear(): void
    {
        $this->logEntries = [];
    }
}
