<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\BankTransactionShow\Controller'
], function () {
    Router::get('/bank/transaction/{id}', 'ShowController@getTransaction')
        ->name('bank.transaction.show');
    Router::get('/bank/transactions', 'ShowController@getAllTransactions')
        ->name('bank.transaction.show');

});
