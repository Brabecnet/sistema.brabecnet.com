<?php

namespace App;

/**
 * ...
 */
class Router
{
    /**
     * ...
     */
    public function __construct()
    {
        $uri = trim(explode('?', $_SERVER['REQUEST_URI'], 2)[0], '/');
        $route = array_values(array_filter(explode('/', $uri), 'strlen'));
        if (empty($route)) {
            $route = ['home'];
        }

        $options = [];
        $is_modal = isset($_GET['modal']);

        switch ($route[0]) {
            case 'home':
                $page = 'Home';
                break;

            case 'error':
                $page = 'Error';
                $options = [
                    'http_code' => $route[1] ?? null,
                ];
                break;

            default:
                $page = 'Error';
                $options = ['404'];
                break;
        }

        $controller_class = 'App\\Controllers\\Pages\\' . $page;
        $controller = new $controller_class($is_modal);
        $controller->run($options);
    }
}
