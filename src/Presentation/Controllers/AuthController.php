<?php

declare(strict_types=1);

namespace Clean\Api\Presentation\Controllers;

use Clean\Api\Presentation\Contracts\Controller;
use Clean\Api\Presentation\Contracts\HttpResponse;

final class AuthController implements Controller
{
    public function handle(mixed $request): HttpResponse
    {
        return new HttpResponse(200, 'uhau');
    }
}
