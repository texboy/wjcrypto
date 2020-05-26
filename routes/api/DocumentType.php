<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group([
    'namespace' => '\Wjcrypto\Document\Controller'
], function () {
    Router::get('/document/types', 'Controller@getTypes')
        ->name('document.types');
});
