<?php

declare(strict_types=1);

namespace Clean\Api\Tests;

use Clean\Api\Domain\ValueObjects\Birthdate;
use Clean\Api\Domain\Errors\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class BirthdateTest extends TestCase
{
    public function testShouldThrowException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Birthdate('2/3/213');
    }

    public function testShouldReturnBirthdate(): void
    {
        $birthdate = new Birthdate('2014-03-20');
        $this->assertEquals($birthdate, '2014-03-20');
    }

    public function testShouldReturnBRLFormat(): void
    {
        $birthdate = new Birthdate('2014-03-20');
        $this->assertEquals($birthdate->formatBRL(), '20/03/2014');
    }
}
