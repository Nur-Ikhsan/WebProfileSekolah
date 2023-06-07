<?php

namespace Rubygroup\WebProfileSekolah\Config;

class Database
{
    private static ?\PDO $pdo = null;

    public static function getConnection(string $env = "testing"): \PDO
    {
        if (self::$pdo == null) {
            // create connection
            require_once __DIR__ . '/../../config/database.php';
            $config = getDatabaseConfig();
            self::$pdo = new \PDO(
                $config['database'][$env]['url'],
                $config['database'][$env]['username'],
                $config['database'][$env]['password']
             );

        }
        return self::$pdo;
    }

    public static function beginTransaction(): void
    {
        self::$pdo->beginTransaction();
    }

    public static function commitTransaction(): void
    {
        self::$pdo->commit();
    }

    public static function rollbackTransaction(): void
    {
        self::$pdo->rollBack();
    }

}
