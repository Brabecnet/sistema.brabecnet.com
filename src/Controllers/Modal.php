<?php

namespace App\Controllers;

use App;

/**
 * ...
 */
class Modal
{
    /**
     * ...
     */
    public function __construct($uri)
    {
        $config = require APP_ROOT . '/config/modal.php';

        $route = array_filter(array_slice(explode('/', $uri), 1), 'strlen');
        if (empty($route)) {
            http_response_code('405');
            echo "405: Method Not Allowed\n\nUse: \n- ";
            echo implode("\n- ", $config['known']);
        } elseif (in_array($route[0], $config['known'])) {
            // code...
        } else {
            http_response_code('404');
            echo '404: Not Found';
        }
    }
}
