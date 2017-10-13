<?php

namespace App\Controllers\Pages;

use App;

/**
 * ...
 */
class Login
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
            if ($form->checkLogin()) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
                die();
            } else {
                $view = new App\Views\PageLogin($form);
            }
        }
        $view->output();
    }
}
