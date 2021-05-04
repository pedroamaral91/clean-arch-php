<?php

declare(strict_types=1);

namespace Clean\Api\Tests;

use Clean\Api\Domain\ValueObjects\Email;
use Clean\Api\Domain\Errors\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    public function testShouldThrowException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Email('invalid_email');
    }

    public function testShouldReturnEmail(): void
    {
        $email = new Email('valid@email.com');
        $this->assertEquals($email, 'valid@email.com');
    }

    public function testShouldBeEqual(): void
    {
        $email = new Email('valid@email.com');
        $email2 = new Email('valid@email.com');
        $this->assertTrue($email->isEqual($email2));
    }

    public function testShouldNotBeEqual(): void
    {
        $email = new Email("email@valid.com");
        $email2 = new Email("anotheremail@valid.com");
        $this->assertFalse($email->isEqual($email2));
    }
}
