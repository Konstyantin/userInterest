<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.03.2017
 * Time: 17:55
 */

namespace App;

/**
 * Class Router
 *
 * Component for work with route
 */
class Router
{
    /**
     * @var array $routes store routes
     */
    private $routes;
    /**
     * Router constructor.
     *
     * Get all routes
     */
    public function __construct()
    {
        $routePath = ROOT . '/app/config/routes.php';
        $this->routes = include($routePath);
    }
    /**
     * Get URI
     *
     * @return string
     */
    public function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    /**
     * Initiate Router
     */
    public function run()
    {
        // get string form request
        $uri = $this->getURI();


        // Check the presence of such a query  in a array of routes
        foreach ($this->routes as $uriPattern => $path) {
            // Compare $uriPattern and $uri
            if (preg_match("~$uriPattern~", $uri)) {
                $pos = strpos($uri, $uriPattern);
                $uri = substr($uri, $pos);
                return $this->defineComponents($uriPattern, $path, $uri);
            }
        }
    }
    /**
     * Define controller, action and params
     *
     * @param string $pattern
     * @param string $path
     * @param string $uri
     * @return bool
     */
    public function defineComponents($pattern, $path, $uri)
    {
        // Get internal path of the external rule
        $internalRoute = preg_replace("~$pattern~", $path, $uri);
        // Define controller, action and params
        $segments = explode('/', $internalRoute);
        $controllerName = ucfirst(array_shift($segments)) . 'Controller';
        $actionName = array_shift($segments) . 'Action';
        $parameters = $segments;
        // Path to Controller file
        $controllerFile = ROOT . '/src/Controller/' . $controllerName . '.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
            $controllerObject = "Acme\\Controller\\" . $controllerName;
            // create new object
            $controllerObject = new $controllerObject;
            // Call action from controller with passed parameters
            $result = call_user_func_array([$controllerObject, $actionName], $parameters);
            if ($result != null) {
                return false;
            }
        }
    }
}