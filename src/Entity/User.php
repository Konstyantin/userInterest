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
     * @var string $sql select users
     */
    public $sql = "SELECT * FROM user";

    /**
     * Get list users
     *
     * Get list all exists user in database
     *
     * @return array
     */
    public function getList()
    {
        $db = Db::connect();

        $sql = $this->sql;

        $query = $db->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}