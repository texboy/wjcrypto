<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\BankTransactionCreate\Controller'
], function () {
    Router::post('/bank/transaction/create', 'CreateController@createTransaction')
        ->name('bank.transaction.create');
});
