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
    public function __construct($view_name, $is_modal)
    {
        parent::__construct();

        // set template
        $this->twig_template = 'pages/' . $view_name . '.twig';

        // add template data
        $this->twig_data = array_merge_recursive(
            $this->twig_data,
            [
                'is_modal' => $is_modal,
                'stylesheets' => [
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
