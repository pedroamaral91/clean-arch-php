<?php

declare(strict_types=1);

namespace Clean\Api\Domain\ValueObjects;

use Clean\Api\Domain\Errors\InvalidArgumentException;

final class Name extends ValueObject
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    protected function setValue($name): void
    {
        if (empty($name)) {
            throw new InvalidArgumentException("name");
        }

        $this->value = $name;
    }
}
