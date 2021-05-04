<?php declare(strict_types=1);

namespace Clean\Api\App\Contracts\Encrypt;

interface HashComparer {
    public function compare(string $plaintext, string $digest): bool;
}
