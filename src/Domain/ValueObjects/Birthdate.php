<?php

namespace Clean\Api\Domain\ValueObjects;

use Clean\Api\Domain\Errors\InvalidArgumentException;
use DateTime;

final class Birthdate extends ValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    protected function setValue($birthdate): void
    {
        if (empty($birthdate)) {
            throw new InvalidArgumentException("birthdate");
        }

        $birthDateArray = explode("-", $birthdate);

        if (count($birthDateArray) !== 3) {
            throw new InvalidArgumentException("birthdate");
        }

        if (checkdate($birthDateArray[1], $birthDateArray[0], $birthDateArray[2])) {
            throw new InvalidArgumentException("birthdate");
        }

        $date = new DateTime($birthdate);

        $this->value = $date->format('Y-m-d');
    }

    public function formatBRL(): string
    {
        return (new DateTime($this->value))->format('d/m/Y');
    }
}
