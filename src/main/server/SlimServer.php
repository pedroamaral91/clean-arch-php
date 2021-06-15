<?php

namespace Clean\Api\main\server;

use Clean\Api\main\Routes\RouterConfig;
use Slim\App;

final class SlimServer
{
    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->app->addBodyParsingMiddleware();
        $this->app->addRoutingMiddleware();
        $this->loadRoutes();
    }

    private function loadRoutes(): void
    {
        $routerConfig = new RouterConfig();
        $routerConfig->configure($this->app);
    }

    public function getApp(): App
    {
        return $this->app;
    }
}


