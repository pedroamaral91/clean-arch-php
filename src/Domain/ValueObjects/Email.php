<?php

namespace Clean\Api\Domain\ValueObjects;

use Clean\Api\Domain\Errors\InvalidArgumentException;

final class Email extends ValueObject
{
    public function __construct(string $email)
    {
        parent::__construct($email);
    }

    protected function setValue(mixed $email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("email");
        }

        $this->value = $email;
    }
}
