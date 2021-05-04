<?php

declare(strict_types=1);

namespace Clean\Api\App\Contracts\Db;

use Clean\Api\Domain\Entities\Customer;
use Clean\Api\Domain\ValueObjects\Email;

interface LoadCustomerByEmail
{
    public function loadCustomerByEmail(Email $email): Customer;
}
