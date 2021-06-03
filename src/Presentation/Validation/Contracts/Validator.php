<?php


namespace Clean\Api\Presentation\Validation\Contracts;


interface Validator
{
    public function __construct(string $field);

    public function validate(mixed $input): bool|\Exception;
}
