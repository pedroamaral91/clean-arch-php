<?php

declare(strict_types=1);

namespace Clean\Api\Infra\Encrypt;

use Clean\Api\Infra\Encrypt\Hash;
use PHPUnit\Framework\TestCase;
use phpmock\MockBuilder;

final class HashTest extends TestCase
{
    public function testShouldReturnFalseIfPasswordNotMatch(): void
    {

        $builder = new MockBuilder();
        $builder->setNamespace(__NAMESPACE__)
            ->setName("password_verify")
            ->setFunction(
                function () {
                    return false;
                }
            );
        $mock = $builder->build();
        $mock->enable();

        $hashComparer = new Hash();
        $this->assertFalse($hashComparer->compare("invalid_password", "password_hash"));
        $mock->disable();
    }
    public function testShouldReturnTrueIfPasswordMatch(): void
    {

        $builder = new MockBuilder();
        $builder->setNamespace(__NAMESPACE__)
            ->setName("password_verify")
            ->setFunction(
                function () {
                    return true;
                }
            );
        $mock = $builder->build();
        $mock->enable();

        $hashComparer = new Hash();
        $this->assertTrue($hashComparer->compare("password", "password_hash"));
        $mock->disable();
    }
}
