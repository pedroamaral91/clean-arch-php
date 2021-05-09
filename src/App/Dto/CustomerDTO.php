<?php

declare(strict_types=1);

namespace Clean\Api\App\Dto;

use Clean\Api\Domain\ValueObjects\Birthdate;
use Clean\Api\Domain\ValueObjects\Cpf;
use Clean\Api\Domain\ValueObjects\Email;
use Clean\Api\Domain\ValueObjects\Name;
use Clean\Api\Domain\ValueObjects\Phone;

final class CustomerDTO
{
    private Cpf $cpf;
    private Name $name;
    private string $password;
    private Email $email;
    private ?Birthdate $birthdate;
    private ?Phone $phone;

    public function __construct(string $cpf, string $name, string $password, string $email, ?string $birthdate = null, ?string $phone = null)
    {
        $this->cpf = new Cpf($cpf);
        $this->name = new Name($name);
        $this->password = $password;
        $this->email = new Email($email);
        $this->birthdate = $birthdate;
        $this->phone = $phone;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getCpf(): Cpf
    {
        return $this->cpf;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getBirthdate(): ?Birthdate
    {
        return $this->birthdate;
    }

    public function getPhone(): ?Phone
    {
        return $this->phone;
    }
}
