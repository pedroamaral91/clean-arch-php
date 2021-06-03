<?php


namespace Clean\Api\Tests\Presentation\Validators;


use Clean\Api\Presentation\Validation\Exceptions\RequiredParamException;
use Clean\Api\Presentation\Validation\Validators\RequiredField;
use PHPUnit\Framework\TestCase;

class RequiredFieldTest extends TestCase
{
    public function testShouldThrowsException()
    {
        $this->expectException(RequiredParamException::class);
        $requiredField = new RequiredField("email");
        $request = ["email" => ""];
        $requiredField->validate($request);
    }

    /**
     * @throws RequiredParamException
     */
    public function testShouldReturnTrue() {
        $requiredField = new RequiredField("email");
        $request = ["email" => "valid@email.com"];
        $this->assertTrue($requiredField->validate($request));
    }
}
