<?php

namespace App\Controllers;

use App;

/**
 * ...
 */
class PageLogin
{
    /**
     * ...
     */
    public function __construct()
    {
        if (empty($_POST)) {
            $view = new App\Views\PageLogin();
        } else {
            $form = new App\Models\Forms\Login($_POST);
            $view = ($form->checkLogin())
                ? new App\Views\PageApp()
                : new App\Views\PageLogin($form);
        }
        $view->output();
    }
}
