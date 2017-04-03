<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.03.2017
 * Time: 17:44
 */

require_once __DIR__ . '/vendor/autoload.php';

use App\Router;

$rootDir = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);

define('ROOT', dirname(__FILE__));
define('ROOT_DIR', $rootDir);

$router = new Router();
$router->run();