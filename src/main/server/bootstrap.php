<?php

use Clean\Api\main\Container\DependencyProvider;
use Clean\Api\main\server\SlimServer;
use Slim\Factory\AppFactory;

require __DIR__ . '/../../../vendor/autoload.php';

AppFactory::setContainer(DependencyProvider::getInstance());

$app = new SlimServer(AppFactory::create());

$app->getApp()->run();
