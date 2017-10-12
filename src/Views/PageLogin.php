<?php

namespace App\Views;

use App;

/**
 * ...
 */
class PageLogin extends View
{
    /**
     * ...
     *
     * @param App\Models\FormLogin $form Form with invalid data
     */
    public function __construct(App\Models\Forms\Login $form = null)
    {
        parent::__construct();

        if ($form === null) {
            $this->twig_data['form'] = [
                'title' => 'Bem-vindo!',
                'text' => 'Por favor, informe seus dados.',
            ];
        } else {
            $this->twig_data['form'] = [
                'title' => 'Erro',
                'text' => 'Você inseriu dados ' . (empty($form->getErrors()) ? 'incorretos' : 'inválidos') . '.',
            ];
        }

        // set template
        $this->twig_template = 'page_login.twig';

        // add template data
        $this->twig_data = array_merge_recursive(
            $this->twig_data,
            [
                'stylesheets'=> [
                    'page_login',
                ],
                'scripts' => [
                    'vendor/aryelgois/utils/auto_focus',
                    'login',
                ]
            ]
        );
    }
}
