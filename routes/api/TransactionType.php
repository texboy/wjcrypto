<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\Transaction\Controller'
], function () {
    Router::get('/transaction/types', 'Controller@getTypes')
        ->name('transaction.types');
});
