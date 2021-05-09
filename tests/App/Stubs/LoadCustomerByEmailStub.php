<?php

declare(strict_types=1);

namespace Clean\Api\Tests\App\Stubs;

use Clean\Api\App\Contracts\Db\LoadCustomerByEmail;
use Clean\Api\App\Dto\CustomerDTO;
use Clean\Api\Domain\ValueObjects\Email;

final class LoadCustomerByEmailStub implements LoadCustomerByEmail
{
    public function loadCustomerByEmail(Email $email): ?CustomerDTO
    {
        $cpf = "49920212040";
        return new CustomerDTO($cpf, "Any Name", "password", "valid@email.com");
    }
}
