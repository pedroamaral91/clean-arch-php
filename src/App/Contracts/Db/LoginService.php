<?php

declare(strict_types=1);

namespace Clean\Api\App\Contracts\Db;

use Clean\Api\Domain\Entities\Customer;

interface LoginService
{
    public function loadByEmail(string $email, string $password): Customer;
}
