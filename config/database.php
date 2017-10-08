<?php
/**
 * Configurations for Medoo\Medoo
 *
 * The option 'database_name' is one of 'databases', selected by the model
 */

return [
    'options' => [
        // required
        'database_type' => 'mysql',
        'server'        => 'localhost',
        'username'      => '',
        'password'      => '',

        // [optional]
        'charset' => 'utf8',
    ],
    'databases' => [
        'app'           => 'brabecnet_sistema',
        'address'       => 'address',
    ]
];
