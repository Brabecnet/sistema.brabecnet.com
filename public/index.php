<?php

$root = realpath(__DIR__ . '/..');

require_once $root . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem($root . '/res/templates');
$twig = new Twig_Environment($loader, array(
    'cache' => $root . '/cache',
    'debug' => true
));

$tmp = [
    'stylesheets' => [
        'global',
        'layout',
        'icomoon'
    ],
    'scripts' => [
        'vendor/aryelgois/utils/namespace',
        'main',
    ]
];

$template = $twig->load('layout.twig');
$template->display($tmp);
