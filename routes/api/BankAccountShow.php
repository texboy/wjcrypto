<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\BankAccountShow\Controller'
], function () {
    Router::get('/bank/account/user/{id}', 'ShowController@getUser')
        ->name('bank.account.get.account.user');

    Router::get('/bank/accounts/', 'ShowController@getAllAccounts')
        ->name('bank.account.get.all.account');

    Router::get('/bank/account/{id}', 'ShowController@getAccount')
        ->name('bank.account.get.account');
});
