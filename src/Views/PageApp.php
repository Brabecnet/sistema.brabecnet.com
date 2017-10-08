<?php

namespace App\Views;

/**
 * ...
 */
class PageApp extends View
{
    /**
     * ...
     */
    public function __construct()
    {
        parent::__construct();

        // set template
        $this->twig_template = 'pages/app.twig';

        // add stylesheets
        $this->twig_data['stylesheets'][] = 'page_app';

        // add scripts
        array_push($this->twig_data['scripts'], 'aside_menu', 'main');
    }
}
