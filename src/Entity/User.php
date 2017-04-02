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
     * Get list users
     *
     * Get list all exists user in database
     *
     * @return array
     */
    public static function getList()
    {
        $db = Db::connect();

        $sql = 'SELECT * FROM user';

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
}