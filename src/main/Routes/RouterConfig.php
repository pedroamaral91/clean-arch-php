<?php

namespace Clean\Api\main\Routes;

use Slim\App;

final class RouterConfig
{
    public function configure(App $app): void
    {

        if ($handle = opendir(__DIR__)) {
            while (false !== ($file = readdir($handle))) {
                $this->load($file, $app);
            }
            closedir($handle);
        }
    }

    private function load(string $fileName, App $app): void
    {
        if (str_ends_with($fileName, 'route.php')) {
            $route = require __DIR__ . "/$fileName";
            $route($app);
        }
    }
}
