<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\BankAccountEdit\Controller'
], function () {
    Router::post('/bank/account/edit/', 'EditController@editAccount')
        ->name('bank.account.edit');
});
