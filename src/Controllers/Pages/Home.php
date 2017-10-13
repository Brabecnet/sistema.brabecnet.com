<?php

namespace App\Controllers\Pages;

use App;

/**
 * ...
 */
class Home extends Page
{
    /**
     * ...
     */
    public function run($options = null)
    {
        $view = new App\Views\PageApp($this->is_modal, 'home', $this->view_data);
        $view->output();
    }
}
