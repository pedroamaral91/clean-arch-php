<?php declare(strict_types=1);

namespace Clean\Api\Tests\App\Stubs;

use Clean\Api\App\Contracts\Encrypt\HashComparer;

final class HashComparerStub implements HashComparer {
    public function compare(string $plaintext, string $digest): bool
    {
        return true;
    }
}
