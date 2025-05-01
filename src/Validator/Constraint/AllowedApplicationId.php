<?php

namespace Jostkleigrewe\AlexaCoreBundle\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class AllowedApplicationId extends Constraint
{
    public string $message = 'The application id "{{ value }}" is not registered.';

    public string $mode = 'strict';

    /**
     * Hier können über die Constraint-Optionen erlaubte Werte definiert werden.
     * Alternativ können wir auch Werte aus der Bundle-Konfiguration injizieren.
     */
    public $allowedValues = [];


    // all configurable options must be passed to the constructor
    public function __construct(
        ?string $mode = null,
        ?string $message = null,
        ?array $groups = null,
        $payload = null)
    {
        parent::__construct([], $groups, $payload);

        $this->mode = $mode ?? $this->mode;
        $this->message = $message ?? $this->message;
    }

}
