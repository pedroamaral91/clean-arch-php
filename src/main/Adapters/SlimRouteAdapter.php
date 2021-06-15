<?php


namespace Clean\Api\main\Adapters;


use Clean\Api\Presentation\Contracts\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class SlimRouteAdapter
{
    private Controller $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ): ResponseInterface {
        $args = $request->getParsedBody();
        $args['args'] = $args;
        $result = $this->controller->handle($args);
        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json')
            ->withStatus($result['code']);;
    }

}
