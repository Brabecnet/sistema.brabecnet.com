<?php

namespace App;

use aryelgois\Utils\Utils;

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
            $route = ['inicio'];
        }

        $options = [];
        $is_modal = isset($_GET['modal']);

        switch ($route[0]) {
            case 'inicio':
                $page = 'Home';
                break;

            case 'pessoas':
                $page = 'People';
                $options = [
                    'action' => $route[1] ?? null,
                ];
                break;

            case 'perfil':
                $page = 'Profile';
                $person = $_SESSION['user']->getId();
                $action = null;

                if (isset($route[1])) {
                    if (Utils::isDigit($route[1])) {
                        if ($route[1] == $person) {
                            // redirect to '/perfil' or "/perfil/$route[2]"
                        }
                        $person = $route[1];
                        $action = $route[2] ?? null;
                    } else {
                        $action = $route[1];
                    }
                }

                $options = [
                    'person' => $person,
                    'action' => $action,
                ];
                break;

            case 'erro':
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
