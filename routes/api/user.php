<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;
use Wjcrypto\User\Controller\ApiController;
use Wjcrypto\User\Controller\Index;

//Router::resource('/user', 'ApiController');
Router::resource('/user', ApiController::class);
