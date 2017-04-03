<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.04.2017
 * Time: 11:20
 */

namespace Acme\Controller;

use Acme\Entity\Interest;
use App\Controller;

/**
 * Class InterestController
 * @package Acme\Controller
 */
class InterestController extends Controller
{
    /**
     * Add new interest
     *
     * @return bool|void
     */
    public function addAction()
    {
        if ($this->request->isSubmit()) {
            $data = $this->request->getSendData();
            $nameInterest = $data['interest-name'] ?? null;

            if (!empty($nameInterest)) {
                Interest::create($nameInterest);

                return $this->redirect('interest/list');
            }
        }

        return $this->render('interest/add');
    }

    /**
     * Get list exist interest
     *
     * @return bool
     */
    public function listAction()
    {
        $list = Interest::getList();

        return $this->render('interest/list', $list);
    }
}