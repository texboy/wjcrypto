<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

/**
 * This file contains all the routes for the project
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\BankAccountRegister\Controller'
], function () {
    Router::post('/bank/account/register', 'RegisterController@registerAccount')
        ->name('BankAccountRegister');
});
