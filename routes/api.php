<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\User\Controller',
    'prefix' => '/api',
    'middleware' =>  \Wjcrypto\Router\Middleware\ApiVerification::class
], function () {
    Router::resource('/user', 'ApiController');
});