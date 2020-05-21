<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Pecee\SimpleRouter\SimpleRouter as Router;
use Wjcrypto\Customer\Controller\ApiController;

Router::resource('/customer', ApiController::class);
