<?php


namespace Clean\Api\main\Config;


final class EnvConfig
{
    private static array $env = [];

    public static function get(string $key): string {
        if (count(self::$env) === 0) {
            self::$env = parse_ini_file(__DIR__.'/../../../.env');
        }
        return self::$env[$key];
    }
}
