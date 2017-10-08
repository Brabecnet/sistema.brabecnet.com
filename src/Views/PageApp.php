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

        // add template data
        $this->twig_data = array_merge_recursive(
            $this->twig_data,
            [
                'stylesheets'=> [
                    'page_app',
                    'modal',
                ],
                'scripts' => [
                    'aside_menu',
                    'main',
                    'modal',
                    'templates',
                ]
            ]
        );
    }
}
