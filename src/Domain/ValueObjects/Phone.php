<?php

declare(strict_types=1);

namespace Clean\Api\Domain\ValueObjects;

use Clean\Api\Domain\Errors\InvalidArgumentException;

final class Phone
{
    private $phone;

    public function __construct(string $ddd, string $phone)
    {
        $this->setValue($ddd, $phone);
    }

    private function setValue(string $ddd, string $phone): void
    {
        $sanitizedPhone = preg_replace('/[^0-9]/', '', $phone);
        $sanitizedDDD = preg_replace('/[^0-9]/', '', $ddd);
        if (
            empty($sanitizedDDD)
            || empty($sanitizedPhone)
            || strlen($sanitizedPhone) < 8
            || strlen($sanitizedPhone) > 9
            || strlen($sanitizedDDD) !== 2
        ) {
            throw new InvalidArgumentException("phone");
        }

        $this->phone = "($sanitizedDDD) $sanitizedPhone";
    }

    public function isEqual(Phone $phone): bool
    {
        return $this->phone == $phone;
    }

    public function __toString(): string
    {
        return $this->phone;
    }
}
