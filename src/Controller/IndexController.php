<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.03.2017
 * Time: 17:50
 */
namespace Acme\Controller;

use App\Controller;

class IndexController extends Controller
{
   public function searchAction()
   {
        return $this->render('search');
   }
}