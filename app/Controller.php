<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.03.2017
 * Time: 12:05
 */

namespace App;

use App\Request;

/**
 * Class Controller
 * @package App
 */
abstract class Controller
{
    /**
     * @var \App\Request
     */
    protected $request;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->request = new Request();
    }

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
     * Redirect to route
     *
     * @param string $path
     */
    protected function redirect(string $path)
    {
        return header('Location: ' . ROOT_DIR . $path);
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
}