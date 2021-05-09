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
    private ?Birthdate $birthdate;
    private Name $name;
    private ?Phone $phone;
    private string $password;

    public static function withNameEmailCpfPassword(Name $name, Email $email, Cpf $cpf, string $password): Customer
    {
        return new Customer($cpf, $email, $name, $password, null, null);
    }

    public function __construct(Cpf $cpf, Email $email, Name $name, ?string $password, ?Phone $phone, ?Birthdate $birthdate)
    {
        $this->cpf = $cpf;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->phone = $phone;
        $this->birthdate = $birthdate;
    }

    public function setPhone(Phone $phone): Customer
    {
        return new Customer($this->cpf, $this->email, $this->name, $this->password, $phone, $this->birthdate);
    }

    public function setBirthdate(Birthdate $birthdate): Customer
    {
        return new Customer($this->cpf, $this->email, $this->name, $this->password, $this->phone, $birthdate);
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
