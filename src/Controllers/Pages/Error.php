<?php

namespace App\Controllers\Pages;

use App;

/**
 * ...
 */
class Error extends Page
{
    /**
     * ...
     */
    public function run($options = null)
    {
        $this->view_data['error'] = [
            'title' => $options['http_code'] ?? '',
        ];

        $view = new App\Views\PageApp($this->is_modal, 'error', $this->view_data);
        $view->output();
    }
}
