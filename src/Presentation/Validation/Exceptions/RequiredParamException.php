<?php


namespace Clean\Api\Presentation\Validation\Exceptions;


use Throwable;

class RequiredParamException extends \Exception
{
    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
