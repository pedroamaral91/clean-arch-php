<?php

declare(strict_types=1);

namespace Clean\Api\Presentation\Helpers;

use JetBrains\PhpStorm\ArrayShape;

final class HttpResponse
{
    /**
     * @param int $statusCode
     * @param mixed|array $body
     * @return array
     */
    public static function send(
        int $statusCode = 200,
        mixed $body = []
    ): array {
        return [
            "code" => $statusCode,
            "body" => $body
        ];
    }
}
