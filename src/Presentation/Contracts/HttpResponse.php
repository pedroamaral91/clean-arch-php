<?php

declare(strict_types=1);

namespace Clean\Api\Presentation\Contracts;

final class HttpResponse
{
    public int $statusCode;
    public mixed $body;

    public function __construct(int $statusCode, mixed $body)
    {
        $this->statusCode = $statusCode;
        $this->body = $body;
    }
}
