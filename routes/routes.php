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
    'middleware' =>  [\Core\Middleware\Logger::class , \Core\Middleware\Cors::class]
], function () {

    Router::options("/{any}", function () {
        $response = response()->httpCode(200);
        if (isset($_SERVER['HTTP_ORIGIN'])) {

            $response->headers([
                'Access-Control-Allow-Origin:' . $_SERVER['HTTP_ORIGIN'],
                'Access-Control-Allow-Credentials: true',
                'Access-Control-Max-Age: 86400'
            ]);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                $response->header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
            }
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                $response->header('Access-Control-Allow-Headers:' . $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']);
            }
        }
        return $response->json([]);
    })->where(["any" => ".*"]);

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
