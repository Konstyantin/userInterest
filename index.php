<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.03.2017
 * Time: 17:44
 */

require_once __DIR__ . '/vendor/autoload.php';

use App\Router;

define('ROOT', dirname(__FILE__));

$router = new Router();
$router->run();