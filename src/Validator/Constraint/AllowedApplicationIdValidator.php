<?php

namespace Jostkleigrewe\AlexaCoreBundle\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Validates the given value against the specified constraint.
 */
class AllowedApplicationIdValidator extends ConstraintValidator
{
    public function __construct(
        private readonly array $allowedApplicationIds = []
    ) {}

    /**
     * Validates the given value against the specified constraint.
     *
     * @param mixed $value The value being validated.
     * @param Constraint $constraint The constraint to validate the value against.
     *
     * @throws UnexpectedValueException If the value's type is not supported by the validator.
     * @throws UnexpectedTypeException If the provided constraint is not an instance of AllowedApplicationId.
     */
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof AllowedApplicationId) {
            throw new UnexpectedTypeException($constraint, AllowedApplicationId::class);
        }


//        if (null === $value || '' === $value) {
//            return;
//        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }


        // access your configuration options like this:
        if ('strict' === $constraint->mode) {
            // ...
        }

        if (!in_array($value, $this->allowedApplicationIds, true)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', (string) $value)
                ->setParameter('{{ allowed_values }}', implode(', ', $this->allowedApplicationIds))
                ->addViolation();
        }
    }
}