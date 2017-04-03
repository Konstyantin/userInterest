<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.04.2017
 * Time: 13:17
 */

namespace Acme\Entity;

use App\Db;
use PDO;

/**
 * Class UserInterest
 * @package Acme\Entity
 */
class UserInterest
{
    /**
     * Add user interest
     *
     * @param int $user_id
     * @param array $interests
     * @return \PDOStatement
     */
    public static function addUserInterest(int $user_id, array $interests)
    {
        $db = Db::connect();

        $sql = self::buildSqlInterest($user_id, $interests);

        $query = $db->prepare($sql);

        $query->execute();

        return $query;
    }

    /**
     * Build sql query by passed interests
     *
     * @param int $user_id
     * @param array $interests
     * @return string
     */
    public static function buildSqlInterest(int $user_id, array $interests)
    {
        $sql = 'INSERT INTO user_interest (user_id, interest_id) VALUES';

        foreach ($interests as $interest_id) {
            // concatenate user_id and interest_id to sql query
            $sql = $sql . " ($user_id, $interest_id),";
        }

        // return result concatenation
        return rtrim($sql, ',');
    }
}