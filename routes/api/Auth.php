<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\Auth\Controller'
], function () {
    Router::get('/auth/user/', 'Controller@getUserByAuth')
        ->name('auth.user');
});
