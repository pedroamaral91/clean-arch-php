<?php

use Clean\Api\main\Config\EnvConfig;

require_once __DIR__ . "/../../../main/Config/EnvConfig.php";

return [
    'dbname'   => EnvConfig::get("DB_NAME"),
    'user'     => EnvConfig::get("DB_USER"),
    'password' => EnvConfig::get("DB_PASS"),
    'host'     => EnvConfig::get("DB_HOST"),
    'driver'   => 'pdo_pgsql',
];
