<?php


namespace Clean\Api\Presentation\Validation\Contracts;


interface Validator
{
    public function validate(mixed $input): bool|\Exception;
}
