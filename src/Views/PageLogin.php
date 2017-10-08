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
        $this->twig_template = 'pages/login.twig';

        // add stylesheets
        $this->twig_data['stylesheets'][] = 'page_login';
    }
}
