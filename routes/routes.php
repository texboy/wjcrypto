<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

/**
 * This file contains all the routes for the project
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::csrfVerifier(new \Core\Middleware\CsrfVerifier());


Router::group([
    'exceptionHandler' => \Core\Handlers\CustomExceptionHandler::class,
    'middleware' =>  \Core\Middleware\Logger::class
], function () {

    Router::get('/auth', function () {
        return 'Auth failed!';
    });
    Router::group([
        'namespace' => '',
        'prefix' => '/api',
        'middleware' =>  \Wjcrypto\Auth\Middleware\ApiAuth::class
    ], function () {
        //Crude way to keep adding routes.
        foreach (glob(__DIR__ . "/api/*") as $filename) {
            require_once $filename;
        }
    });
});
