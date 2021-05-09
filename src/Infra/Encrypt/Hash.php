<?php

declare(strict_types=1);

namespace Clean\Api\Infra\Encrypt;

use Clean\Api\App\Contracts\Encrypt\HashComparer;

final class Hash implements HashComparer
{
    public function compare(string $plaintext, string $digest): bool
    {
        return password_verify($plaintext, $digest);
    }
}
