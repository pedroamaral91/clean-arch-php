<?php


namespace Clean\Api\Infra\Db\Doctrine;


use Clean\Api\main\Config\EnvConfig;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

final class GlobalConnection
{
    private static ?EntityManager $connection = null;

    /**
     * @throws ORMException
     */
    public static function getEntityManager(): EntityManager
    {
        if (!self::$connection) {
            $isDevMode = true;
            $proxyDir = null;
            $cache = null;
            $useSimpleAnnotationReader = false;
            $config = Setup::createAnnotationMetadataConfiguration(array(
                __DIR__ . "/Entities"
            ), $isDevMode, $proxyDir,
                $cache, $useSimpleAnnotationReader);
            $conn = array(
                'driver' => 'pdo_pgsql',
                'user' => EnvConfig::get('DB_USER'),
                'password' => EnvConfig::get('DB_PASS'),
                'dbname' => EnvConfig::get('DB_NAME'),
                'host' => EnvConfig::get('DB_HOST'),
                'port' => intval(EnvConfig::get('DB_PORT'))
            );
            self::$connection = EntityManager::create($conn, $config);
            return self::$connection;
        }
        return self::$connection;
    }
}
