<?php

declare(strict_types=1);

namespace Clean\Api\Tests\App\Stubs;

use Clean\Api\App\Contracts\Db\LoadCustomerByEmail;
use Clean\Api\Domain\Entities\Customer;
use Clean\Api\Domain\ValueObjects\Cpf;
use Clean\Api\Domain\ValueObjects\Email;
use Clean\Api\Domain\ValueObjects\Name;

final class LoadCustomerByEmailStub implements LoadCustomerByEmail
{
    public function loadCustomerByEmail(Email $email): Customer
    {
        $cpf = new Cpf("49920212040");
        $name = new Name("Any Name");
        return Customer::withCpfAndEmail($cpf, $email, $name);
    }
}
