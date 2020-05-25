<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\BankAccountShow\Controller'
], function () {
    Router::get('/bank/account/{id}', 'ShowController@getAccount')
        ->name('bank.account.get.account');

    Router::get('/bank/accounts', 'ShowController@getAllAccounts')
        ->name('bank.account.get.all.accounts');
});
