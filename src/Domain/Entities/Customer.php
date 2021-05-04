<?php

namespace Clean\Api\Domain\Entities;

use Clean\Api\Domain\ValueObjects\Birthdate;
use Clean\Api\Domain\ValueObjects\Cpf;
use Clean\Api\Domain\ValueObjects\Email;
use Clean\Api\Domain\ValueObjects\Name;
use Clean\Api\Domain\ValueObjects\Phone;

final class Customer
{
    private Cpf $cpf;
    private Email $email;
    private Birthdate $birthdate;
    private Name $name;
    private Phone $phone;
    private string $password;

    public static function withCpfAndEmail(Cpf $cpf, Email $email, Name $name)
    {
        return new Customer($cpf, $email, $name);
    }

    public function __construct(Cpf $cpf, Email $email, Name $name)
    {
        $this->cpf = $cpf;
        $this->email = $email;
        $this->name = $name;
    }

    public function setPhone(Phone $phone): Customer
    {
        $this->phone = $phone;
        return $this;
    }

    public function setBirthdate(Birthdate $birthdate): Customer
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
