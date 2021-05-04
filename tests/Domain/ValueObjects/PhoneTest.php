<?php

declare(strict_types=1);

use Clean\Api\Domain\Errors\InvalidArgumentException;
use Clean\Api\Domain\ValueObjects\Phone;
use PHPUnit\Framework\TestCase;

final class PhoneTest extends TestCase
{
    public function testShouldThrowException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone("44", "214213");
    }

    public function testShouldReturnPhone(): void
    {
        $phone = new Phone("44", "997229425");
        $this->assertEquals($phone, "(44) 997229425");
    }
}
