<?php

declare(strict_types=1);

namespace Clean\Api\App\Usecases;

use Clean\Api\App\Contracts\Db\LoadCustomerByEmail;
use Clean\Api\App\Contracts\Db\LoginService;
use Clean\Api\App\Contracts\Encrypt\HashComparer;
use Clean\Api\App\Exceptions\InvalidCredentialsException;
use Clean\Api\Domain\Entities\Customer;
use Clean\Api\Domain\ValueObjects\Birthdate;
use Clean\Api\Domain\ValueObjects\Cpf;
use Clean\Api\Domain\ValueObjects\Email;
use Clean\Api\Domain\ValueObjects\Name;

final class DbLogin implements LoginService
{
    private LoadCustomerByEmail $loadCustomer;
    private HashComparer $hashComparer;

    public function __construct(LoadCustomerByEmail $loadCustomer, HashComparer $hashComparer)
    {
        $this->loadCustomer = $loadCustomer;
        $this->hashComparer = $hashComparer;
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function loadByEmail(string $email, string $password): ?Customer
    {

        $customer = $this->loadCustomer->loadCustomerByEmail(new Email($email));

        if (!$this->hashComparer->compare($password, $customer->getPassword())) {
            throw new InvalidCredentialsException();
        }

        return Customer::withNameEmailCpfPassword($customer->getName(), $customer->getEmail(), $customer->getCpf(), $customer->getPassword());
    }
}
