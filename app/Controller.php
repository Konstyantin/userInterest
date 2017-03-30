<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.03.2017
 * Time: 12:05
 */

namespace App;


/**
 * Class Controller
 * @package App
 */
abstract class Controller
{
    /**
     * Return a render view
     *
     * @param string $view
     * @param null $data
     *
     * @return bool
     */
    protected function render(string $view, $data = null)
    {
        // path to directory which is store view files
        $path = ROOT . '/src/View/' . $view . '.phtml';
        if (file_exists($path)) {
            require_once(ROOT . '/app/layout/header.phtml');   // include header layout
            require_once($path);
            require_once(ROOT . '/app/layout/footer.phtml');   // include footer layout
        }

        return false;
    }

    /**
     * Return flash message
     *
     * @param string $message
     * @return string
     */
    protected function setFlashMessage(string $message)
    {
        return (string)$message;
    }

    /**
     * Check is submitted form or not
     *
     * @return bool
     */
    protected function isSubmit()
    {
        return isset($_POST['submit']) ? true : false;
    }
}