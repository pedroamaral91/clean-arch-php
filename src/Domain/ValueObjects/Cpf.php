<?php

namespace Clean\Api\Domain\ValueObjects;

use Clean\Api\Domain\Errors\InvalidArgumentException;
use Clean\Api\Domain\ValueObjects\ValueObject;

final class Cpf extends ValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    protected function setValue(mixed $value): void
    {
        $cpf = preg_replace('/[^0-9]/is', '', $value);
        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            throw new InvalidArgumentException("cpf");
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                throw new InvalidArgumentException("cpf");
            }
        }
        $this->value = $cpf;
    }

    public function withMask(): string
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $this->value);
    }
}
