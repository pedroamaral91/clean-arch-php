<?php


namespace Clean\Api\Tests\Presentation\Controllers;


use Clean\Api\App\Contracts\Db\LoginService;
use Clean\Api\App\Exceptions\InvalidCredentialsException;
use Clean\Api\Presentation\Controllers\AuthController;
use Clean\Api\Presentation\Validation\Contracts\Validator;
use Clean\Api\Tests\Presentation\Stubs\CustomerFactory;
use Mockery;
use PHPUnit\Framework\TestCase;

class AuthControllerTest extends TestCase
{
    /** @var LoginService|Mockery::MockeryInterface $loginServiceMock */
    private mixed $loginService;

    /** @var Validator $validationMock */
    private Validator $validator;

    public function testShouldReturnCorrectCustomer()
    {
        $this->validator->allows([
            "validate" => true
        ]);
        $this->loginService->shouldReceive("loadByEmail")
            ->andReturn(CustomerFactory::generate())->once();
        $controller = new AuthController($this->loginService, $this->validator);
        $response = $controller->handle([
            'email'    => 'valid@email.com',
            'password' => 'any_password'
        ]);
        $this->assertEquals([
            'code' => 200,
            'body' => CustomerFactory::generate()
        ], $response);
    }

    public function testShouldCatchException()
    {
        $exception = new InvalidCredentialsException();
        $this->loginService->shouldReceive('loadByEmail')->andThrow($exception);

        $this->validator->allows([
            "validate" => true
        ]);

        $controller = new AuthController($this->loginService, $this->validator);

        $response = $controller->handle([
            'email'    => 'valid@email.com',
            'password' => 'any_password'
        ]);

        $this->assertEquals([
            "code" => $exception->getCode(),
            "body" => $exception->getMessage()
        ], $response);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->loginService
            = Mockery::mock('Clean\Api\App\Contracts\Db\LoginService');
        $this->validator
            = Mockery::mock('Clean\Api\Presentation\Validation\Contracts\Validator');
    }

}
