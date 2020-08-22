<?php
## Adapted from MVC Tutorium with Philip Braunen and "Build a PHP MVC application" from Codecourse (https://www.youtube.com/watch?v=OsCTzGASImQ)

namespace App\Core;


/**
 * Class App
 * @package App\Core
 */
// Directs all url requests to appropriate controllers and methods with parameters when applicable
// Directs to home/index if requested url doesn't exist
class App
{
    private $controller = "App\Controllers\HomeController";
    private $method = "index";
    private $params;

    // Convert requested url into controller namespace, class, method, and parameters as applicable
    public function __construct()
    {
        $url = $this->parseUrl();

        if (isset($url)) {
            $requestedController = 'App\Controllers\\' . ucfirst($url[0]) . 'Controller';
            if (isset($url[1])) {
                if (class_exists('App\Controllers\\' . ucfirst($url[0]) . '\\' . ucfirst($url[1]) . 'Controller')) {
                    $namespace = 'App\Controllers\\' . ucfirst($url[0]);
                    $requestedController = $namespace . '\\' . ucfirst($url[1]) . 'Controller';
                    unset($url[1]);
                }
            }
            unset($url[0]);
        }

        if (isset($requestedController)) {
            if (class_exists($requestedController)) {
                $this->controller = $requestedController;
                unset($url[0]);
            }
        }

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        // call controller, method and parameters
        $controller = new $this->controller;
        $params = $this->params;
        $method = $this->method;

        $controller->$method($params);
    }

    // Convert url into assoc. array
    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        } else {
            return null;
        }
    }
}