<?php

use Clean\Api\main\Adapters\SlimRouteAdapter;
use Clean\Api\main\Container\DependencyProvider;
use Slim\App;

require __DIR__ . '/../Factories/Controllers/AuthControllerFactory.php';

return function (App $app) {
    $container = DependencyProvider::getInstance();
    $authController = $container->get('AuthController');
    $adapter = new SlimRouteAdapter($authController);
    return $app->post('/', $adapter);
};
