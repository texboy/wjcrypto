<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

/**
 * This file contains all the routes for the project
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::csrfVerifier(new \Wjcrypto\Router\Middleware\CsrfVerifier());

// API


Router::group([
    'namespace' => '\Wjcrypto\Router\Controller',
    'exceptionHandler' =>\Wjcrypto\Router\Handlers\CustomExceptionHandler::class,
], function () {

    //Crude way to keep adding routes.
    require_once __DIR__.'/api.php';

});
