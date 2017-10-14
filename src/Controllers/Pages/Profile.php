<?php

namespace App\Controllers\Pages;

use App;

/**
 * ...
 */
class Profile extends Page
{
    /**
     * ...
     */
    public function run($options = null)
    {
        $view = new App\Views\PageApp($this->is_modal, 'profile', $this->view_data);
        $view->output();
    }
}
