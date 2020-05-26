<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\Customer\Controller'
], function () {
    Router::get('/customer/types', 'Controller@getTypes')
        ->name('customer.types');
});
