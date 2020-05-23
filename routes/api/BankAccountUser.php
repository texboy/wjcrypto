<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\BankAccountUser\Controller'
], function () {
    Router::get('/bank/account/user/{id}', 'AccountUserController@getAccount')
        ->name('bank.account.get.user');

    Router::get('/bank/account/users', 'AccountUserController@getAllAccounts')
        ->name('bank.account.get.all.users');
});
