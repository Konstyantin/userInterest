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
    public function getList()
    {
        $db = Db::connect();

        $sql = 'SELECT * FROM interest';

        $query = $db->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}