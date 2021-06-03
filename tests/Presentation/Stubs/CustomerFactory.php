<?php


namespace Clean\Api\Tests\Presentation\Stubs;


use Clean\Api\Domain\Entities\Customer;
use Clean\Api\Domain\ValueObjects\Cpf;
use Clean\Api\Domain\ValueObjects\Email;
use Clean\Api\Domain\ValueObjects\Name;

class CustomerFactory
{
    public static function generate(): Customer
    {
        return Customer::withNameEmailCpfPassword(new Name('any_name'), new Email('valid@email.com'),
            new Cpf("72898273090"), "any_password");
    }

}
