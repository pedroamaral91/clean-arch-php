<?php

namespace Clean\Api\Infra\Db\Doctrine\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="customers")
 **/
class CustomerEntity
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue * */
    private int $id;

    /** @ORM\Column(type="string") * */
    private string $name;

    /** @ORM\Column(type="string") * */
    private string $email;

    /** @ORM\Column(type="string") * */
    private string $cpf;

    /** @ORM\Column(type="string") * */
    private string $password;

    /** @ORM\Column(type="string") * */
    private ?string $phone;

    /** @ORM\Column(type="string") * */
    private ?string $birthdate;

    /**
     * CustomerEntity constructor.
     *
     * @param string $name
     * @param string $email
     * @param string $cpf
     * @param string $password
     * @param string|null $phone
     * @param string|null $birthdate
     */
    public function __construct(
        string $name,
        string $email,
        string $cpf,
        string $password,
        ?string $phone,
        ?string $birthdate
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->password = $password;
        $this->phone = $phone;
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $cpf
     */
    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param string|null $birthdate
     */
    public function setBirthdate(?string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }
}
