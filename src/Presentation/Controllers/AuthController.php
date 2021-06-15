<?php

declare(strict_types=1);

namespace Clean\Api\Presentation\Controllers;

use Clean\Api\App\Contracts\Db\LoginService;
use Clean\Api\Presentation\Contracts\Controller;
use Clean\Api\Presentation\Helpers\HttpResponse;
use Clean\Api\Presentation\Helpers\HttpStatusCode;
use Clean\Api\Presentation\Validation\Contracts\Validator;

final class AuthController implements Controller
{

    private LoginService $loginService;
    private Validator $validator;

    public function __construct(LoginService $loginService, Validator $validator)
    {
        $this->loginService = $loginService;
        $this->validator = $validator;
    }

    public function handle(mixed $request): array
    {
        try {
            $this->validator->validate($request);
            $response = $this->loginService->loadByEmail($request['email'], $request['password']);
            return HttpResponse::send(HttpStatusCode::OK, $response);

        } catch (\Exception $exception) {
            $code = $exception->getCode() ?: 500;
            return HttpResponse::send($code, $exception->getMessage());
        }
    }
}
