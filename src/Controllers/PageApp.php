<?php

namespace App\Controllers;

use App;

/**
 * ...
 */
class PageApp
{
    /**
     * ...
     */
    public function __construct()
    {
        $config = require APP_ROOT . '/config/pages.php';
        $uri = trim(explode('?', $_SERVER['REQUEST_URI'], 2)[0], '/');
        $route = array_filter(explode('/', $uri), 'strlen');

        $is_modal = false;
        if (!empty($route) && $route[0] == 'modal') {
            array_shift($route);
            $is_modal = true;
        }

        if (empty($route)) {
            $view_name = 'home';
        } else {
            if (in_array($route[0], $config['known'])) {
                $view_name = $route[0];
            } else {
                $view_name = 'error';
                http_response_code('404');
            }
        }
        $view = new App\Views\PageApp($view_name, $is_modal);
        $view->output();
    }
}
