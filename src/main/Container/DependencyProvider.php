<?php


namespace Clean\Api\main\Container;


use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;

final class DependencyProvider
{
    private static ?Container $instance = null;

    private function __construct()
    {
        return self::getInstance();
    }

    public static function getInstance(): Container
    {
        if (self::$instance === null) {
            self::$instance = new Container();
            return self::$instance;
        }
        return self::$instance;
    }

    public function set(string $service, callable $callback): void
    {
        self::$instance->set($service, $callback);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function get(string $service): Container
    {
        return self::$instance->get($service);
    }

}
