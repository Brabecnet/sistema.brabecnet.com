<?php

namespace App\Views;

use Twig;

/**
 * ...
 */
abstract class View
{
    /**
     * ...
     */
    const TWIG_CACHE = APP_ROOT . '/cache';

    /**
     * ...
     */
    const TWIG_PATH = APP_ROOT . '/res/templates';

    /**
     * ...
     *
     * @var mixed[]
     */
    protected $twig_data;

    /**
     * ...
     *
     * @var Twig\Environment
     */
    protected $twig_env;

    /**
     * ...
     *
     * @var string
     */
    protected $twig_template;

    /**
     * ...
     */
    public function __construct()
    {
        // initialize Twig
        $loader = new Twig\Loader\FilesystemLoader(self::TWIG_PATH);
        $this->twig_env = new Twig\Environment(
            $loader,
            [
                'cache' => self::TWIG_CACHE,
                'debug' => true
            ]
        );

        // Twig extensions
        $this->twig_env->addFilter(new Twig\TwigFilter(
            'indent',
            'aryelgois\\Utils\\Format::stringIndent',
            [
                'is_safe' => ['html']
            ]
        ));

        // Default templates' data
        $this->twig_data = [
            'copyright_full' => '&copy; 2017 <a href="http://brabecnet.com" class="dark">Brabecnet Serviços de Comunicação Multimídia LTDA</a>',
            'copyright_short' => '&copy; 2017 <a href="http://brabecnet.com" class="dark">Brabecnet</a>',
            'stylesheets' => [
                'vendor/wip',
                'global',
                'layout',
                'icomoon'
            ],
            'scripts' => [
                'vendor/aryelgois/utils/namespace',
            ]
        ];

    }

    public function output()
    {
        echo $this->twig_env->render($this->twig_template, $this->twig_data);
    }
}
