<?php


namespace Clean\Api\Presentation\Validation\Validators;


class ValidatorComposite implements \Clean\Api\Presentation\Validation\Contracts\Validator
{

    private array $validators;

    public function __construct(array $validator)
    {
        $this->validators = $validator;
    }

    public function validate(mixed $input): bool|\Exception
    {
        foreach ($this->validators as $validator) {
            $error = $validator->validate($input);
            if ($error) {
                return false;
            }
        }
        return true;
    }
}
