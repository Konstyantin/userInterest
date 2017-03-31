<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.03.2017
 * Time: 17:50
 */
namespace Acme\Controller;

use Acme\Entity\Interest;
use Acme\Entity\User;
use App\Controller;
/**
 * Class IndexController
 * @package Acme\Controller
 */
class UserController extends Controller
{
    /**
     * Search action
     *
     * Allow search data in database
     *
     * @return bool
     */
    public function searchAction()
    {
        $interest = Interest::getList();

        return $this->render('search', $interest);
    }

    /**
     * Registration user
     *
     * @return bool
     */
    public function registerAction()
    {
        $data = $this->request->getSendData();

        $interest = Interest::getList();

        if ($data) {
            $result = User::create($data);

        }

        return $this->render('register', $interest);
    }
}