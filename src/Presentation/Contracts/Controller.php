<?php

declare(strict_types=1);

namespace Clean\Api\Presentation\Contracts;

use Clean\Api\Presentation\Contracts\HttpResponse;

interface Controller
{
    public function handle(mixed $request): array;
}
