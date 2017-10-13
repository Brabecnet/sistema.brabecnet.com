<?php

namespace App\Controllers\Pages;

/**
 * ...
 */
abstract class Page
{
    /**
     * ...
     */
    protected $is_modal;

    /**
     * ...
     */
    protected $view_data;

    /**
     * ...
     */
    public function __construct($is_modal)
    {
        $this->is_modal = $is_modal;

        // global data
        $this->view_data = [
            'user' => $_SESSION['user']->getData(),
        ];
    }

    abstract public function run($options = null);
}
