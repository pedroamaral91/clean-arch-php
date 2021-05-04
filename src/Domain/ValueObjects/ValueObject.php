<?php

declare(strict_types=1);

namespace Clean\Api\Domain\ValueObjects;

abstract class ValueObject
{
    protected $value;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    abstract protected function setValue(mixed $value): void;

    public function isEqual(ValueObject $value): bool
    {
        return !empty($value) && $value instanceof ValueObject && $value == $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
