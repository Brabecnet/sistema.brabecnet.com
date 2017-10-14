<?php

namespace App\Controllers\Pages;

use App;

/**
 * ...
 */
class People extends Page
{
    /**
     * ...
     */
    public function run($options = null)
    {
        switch ($options['action'] ?? null) {
            case null:
                // the page about every people or a people searcher
                break;

            case 'adicionar':
                // a form to create a new person registry
                break;

            default:
                // code...
                break;
        }

        $view = new App\Views\PageApp($this->is_modal, 'people', $this->view_data);
        $view->output();
    }
}
