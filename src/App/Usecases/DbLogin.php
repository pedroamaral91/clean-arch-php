<?php

declare(strict_types=1);

namespace Clean\Api\App\Usecases;

use Clean\Api\App\Contracts\Db\LoadCustomerByEmail;
use Clean\Api\App\Contracts\Db\LoginService;
use Clean\Api\App\Contracts\Encrypt\HashComparer;
use Clean\Api\Domain\Entities\Customer;
use Clean\Api\Domain\ValueObjects\Email;

final class DbLogin implements LoginService
{
    private LoadCustomerByEmail $loadCustomer;
    private HashComparer $hashComparer;

    public function __construct(LoadCustomerByEmail $loadCustomer, HashComparer $hashComparer)
    {
        $this->loadCustomer = $loadCustomer;
        $this->hashComparer = $hashComparer;
    }

    public function loadByEmail(string $email, string $password): Customer
    {
        $emailObject = new Email($email);
        $customer = $this->loadCustomer->loadCustomerByEmail($emailObject, $password);
        if ($this->hashComparer->compare($password, $customer->getPassword())) return null;

        return Customer::withCpfAndEmail($customer->cpf, $customer->email, $customer->name);
    }
}
