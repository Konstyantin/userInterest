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
use Acme\Entity\UserInterest;
use Acme\Model\User\RegisterValidation;
use App\Controller;
use App\Db;
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

            return $this->render('user/userList', $userList);
        }

        return $this->render('user/search', $interest);
    }

    /**
     * Registration user
     *
     * @return bool
     */
    public function registerAction()
    {
        // interests list
        $interest = Interest::getList();

        // check submit form
        if ($this->request->isSubmit()) {

            // send form data
            $data = $this->request->getSendData();

            $validate = new RegisterValidation($data);

            $result = $validate->formValidate();

            if ($result === true) {

                $form = new FormData($data);

                // get interest data
                $userInterest = $form->getInterestData();

                // if send form data is not empty
                if ($data) {

                    // create new user
                    $result = User::create($data);

                    // get id last created user
                    $id = User::getLastUserId()->id;

                    // add user interest
                    UserInterest::addUserInterest($id, $userInterest);
                }

                return $this->redirect('search');
            }

            return $this->render('user/register', ['errors' => $result, 'interest' => $interest]);
        }

        return $this->render('user/register', ['interest' => $interest]);
    }
}