<?php

declare(strict_types=1);

namespace Clean\Api\Domain\Errors;

use Exception;

final class InvalidArgumentException extends Exception
{
    public function __construct(string $arg)
    {
        $this->code = 400;
        $this->message = "Invalid argument: $arg";
    }
}
