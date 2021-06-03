<?php


namespace Clean\Api\Presentation\Validation\Validators;


use Clean\Api\Presentation\Validation\Contracts\Validator;
use Clean\Api\Presentation\Validation\Exceptions\RequiredParamException;

class RequiredField implements Validator
{

    private string $field;

    public function __construct(string $field)
    {
        $this->field = $field;
    }

    /**
     * @throws RequiredParamException
     */
    public function validate(mixed $input): bool|\Exception
    {
        if (empty($input[$this->field])) {
            throw new RequiredParamException("$this->field is required");
        }

        return true;
    }
}
