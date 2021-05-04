<?php

declare(strict_types=1);

namespace Clean\Api\Tests;

use Clean\Api\Domain\ValueObjects\Cpf;
use Clean\Api\Domain\Errors\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class CpfTest extends TestCase
{
    public function testShouldThrowExceptionWithMask(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Cpf('111.111.111-1');
    }

    public function testShouldThrowExceptionWithoutMask(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Cpf('08283409935');
    }

    public function testShouldReturnCpfWithoutMask(): void
    {
        $cpf = new Cpf('294.900.640-09');
        $this->assertEquals($cpf, '29490064009');
    }
    public function testShouldReturnCpfWithMask(): void
    {
        $cpf = new Cpf('29490064009');
        $this->assertEquals($cpf->withMask(), '294.900.640-09');
    }

    public function testShouldBeEqual(): void
    {
        $email = new Cpf('294.900.640-09');
        $email2 = new Cpf('294.900.640-09');
        $this->assertTrue($email->isEqual($email2));
    }

    public function testShouldNotBeEqual(): void
    {
        $email = new Cpf("294.900.640-09");
        $email2 = new Cpf("717.133.910-66");
        $this->assertFalse($email->isEqual($email2));
    }
}
