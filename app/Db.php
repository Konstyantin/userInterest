<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.03.2017
 * Time: 12:59
 */

namespace App;

use PDO;

/**
 * Class Db
 * @package App
 */
class Db
{
    /**
     * @var object PDO
     */
    private static $instance;

    /**
     * The constructor is private to prevent initiation with outer code.
     */
    private function __construct(){}

    /**
     * Stopping Clonning of Object
     */
    private function __clone(){}

    /**
     * Stopping unserialize of object
     */
    private function __wakeup(){}

    /**
     * Connect to the database on the specified parameters
     *
     * @return PDO
     */
    public static function connect()
    {
        if (self::$instance === null) {

            /**
             * Path to params for connection to database
             */
            $paramsPath = ROOT . '/app/config/db_params.php';
            $params = include($paramsPath);

            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

            try {
                self::$instance = new PDO($dsn, $params['user'], $params['password']);
                self::$instance->exec("set names utf8");
                return self::$instance;
            } catch (\PDOException $e) {
                echo "Error connect to database" . $e->getMessage();
            }
        }

        return self::$instance;
    }
}