<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.03.2017
 * Time: 17:54
 */

/**
 * Routes list
 */
return [
    'search'        => 'user/search',
    'register'      => 'user/register',
    'user/'         => 'user/view/$1',
//    'user/([0-9]+)'         => 'user/view/$1',
    'interest/add'  => 'interest/add',
    'interest/list' => 'interest/list',
];