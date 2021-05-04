<?php

declare(strict_types=1);

use Clean\Api\Domain\Errors\InvalidArgumentException;
use Clean\Api\Domain\ValueObjects\Name;
use PHPUnit\Framework\TestCase;

final class NameTest extends TestCase
{
    public function testShouldThrowException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name("");
    }

    public function testShouldReturnPhone(): void
    {
        $name = new Name("Teste da Silva");
        $this->assertEquals($name, "Teste da Silva");
    }
}
