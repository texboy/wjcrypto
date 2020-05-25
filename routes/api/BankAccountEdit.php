<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\BankAccountEdit\Controller'
], function () {
//    Router::get('/bank/account/{id}', 'AccountUserController@getAccount')
//        ->name('bank.account.get.account');
//
//    Router::get('/bank/accounts', 'AccountUserController@getAllAccounts')
//        ->name('bank.account.get.all.accounts');

    Router::post('/bank/account/edit/', 'EditController@editAccount')
        ->name('bank.account.edit');
});
