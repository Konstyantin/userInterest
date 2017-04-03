<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 30.03.17
 * Time: 22:40
 */

namespace Acme\Entity;

use PDO;
use App\Db;

/**
 * Class Interest
 * @package Acme\Entity
 */
class Interest
{
    /**
     * Get list interests
     *
     * Get all exists interests in database
     *
     * @return array
     */
    public static function getList()
    {
        $db = Db::connect();

        $sql = 'SELECT * FROM interest';

        $query = $db->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Create new Interest
     *
     * Create new interest for filters user on searching
     *
     * @param string $name
     * @return bool
     */
    public static function create(string $name)
    {
        $db = Db::connect();

        $sql = 'INSERT INTO interest (name) VALUES (:name);';

        $query = $db->prepare($sql);

        $query->bindParam(':name', $name, PDO::PARAM_STR);

        $query->execute();

        return $query;
    }

    /**
     * Delete interest by id
     *
     * @param int $id
     * @return bool
     */
    public static function delete(int $id)
    {
       $db = Db::connect();

       $sql = 'DELETE FROM interest WHERE id = :id';

       $query = $db->prepare($sql);

       $query->bindParam(':id', $id, PDO::PARAM_INT);

       return $query->execute();
    }

    /**
     * Get user data by id
     *
     * @param int $id
     * @return array
     */
    public static function getInterestByUserId(int $id)
    {
        $db = Db::connect();

        $sql = 'SELECT interest.name FROM interest INNER JOIN user_interest ON user_interest.interest_id = interest.id WHERE user_interest.user_id = :id';

        $query = $db->prepare($sql);

        $query->bindParam(':id', $id, PDO::PARAM_INT);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}