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
            if ($form->checkLogin()) {
                header('Location: .');
                die();
            } else {
                $view = new App\Views\PageLogin($form);
            }
        }
        $view->output();
    }
}
