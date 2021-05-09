<?php

declare(strict_types=1);

use Clean\Api\App\Usecases\DbLogin;
use Clean\Api\Tests\App\Stubs\HashComparerStub;
use Clean\Api\Tests\App\Stubs\LoadCustomerByEmailStub;
use PHPUnit\Framework\TestCase;

final class LoginServiceTest extends TestCase
{

    private function makeSut(): stdClass
    {
        $sut = new stdClass();
        $loadByEmailStub = new LoadCustomerByEmailStub();
        $hashComparer = new HashComparerStub();
        $sut->login = new DbLogin($loadByEmailStub, $hashComparer);
        return $sut;
    }
    public function testShouldReturnCustomer(): void
    {
        $validEmail = "valid@email.com";
        $password = "password";
        $service = $this->makeSut();
        $customer = $service->login->loadByEmail($validEmail, $password);
        $this->assertEquals($customer->getEmail(), $validEmail);
    }
}
