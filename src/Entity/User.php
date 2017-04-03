<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 30.03.17
 * Time: 22:10
 */
namespace Acme\Entity;

use App\Db;
use PDO;

/**
 * Class User
 * @package Acme\Entity
 */
class User
{
    /**
     * @var string
     */
    private static $defaultSearchQuery = 'SELECT * FROM user';

    /**
     * Get list users
     *
     * Get list all exists user in database
     *
     * @return array
     */
    public static function getList(string $sql = null)
    {
        $db = Db::connect();

        $sql = $sql ? $sql : self::$defaultSearchQuery;

        var_dump($sql);

        $query = $db->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Create new record
     *
     * Create new record which store information about user
     *
     * @param array $data
     * @return \PDOStatement
     */
    public static function create(array $data)
    {
        $db = Db::connect();

        $sql = 'INSERT INTO user (first_name, last_name, email, age, created_at) 
                            VALUES (:first_name, :last_name, :email, :age, UNIX_TIMESTAMP())';

        $query = $db->prepare($sql);

        $query->bindParam(':first_name', $data['first-name'], PDO::PARAM_STR);
        $query->bindParam(':last_name', $data['last-name'], PDO::PARAM_STR);
        $query->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $query->bindParam(':age', $data['age'], PDO::PARAM_STR);

        return $query->execute() ? true : false;
    }

    /**
     * Get last user id
     *
     * Get last created user id
     *
     * @return mixed
     */
    public static function getLastUserId()
    {
        $db = Db::connect();

        $sql = 'SELECT id FROM user ORDER BY id DESC LIMIT 1';

        $query = $db->prepare($sql);

        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get user by id
     *
     * @param int $id
     * @return mixed
     */
    public static function getUserById(int $id)
    {
        $db = Db::connect();

        $sql = 'SELECT user.first_name, user.last_name FROM user WHERE id = :id';

        $query = $db->prepare($sql);

        $query->bindParam(':id', $id, PDO::PARAM_INT);

        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }
}