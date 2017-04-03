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
use App\FormData;
use App\QueryData;

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
        // interest list for view
        $interest = Interest::getList();

        // check submit form
        if ($this->request->isSubmit()) {
            // get send form data
            $sendData = $this->request->getSendData();

            // default form data
            $searchData = null;

            // check empty form data
            if (!empty($sendData)) {

                // separate send data as interest, created, age, and all data
                $form = new FormData($sendData);

                // build sql query by send form data
                $query = new QueryData($form);

                // get sql query
                $searchData = $query->getQueryData();
            }

            // get user list by sql query
            $userList = User::getList($searchData);

            return $this->render('userList', $userList);
        }

        return $this->render('search', ['interest' => $interest]);
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