<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Database
{
    private static $em = null;

    public static function getConnection()
    {
        include (__DIR__."/bootstrap.php");

        $config = $config;

        if (self::$em == null) {
            try {
                $em = $entityManager;

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $em;
        
    }
}