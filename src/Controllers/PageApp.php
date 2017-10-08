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
        $view = new App\Views\PageApp();
        $view->output();
    }
}
