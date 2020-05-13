<?php

// Using composer autoloader hehe
require __DIR__.'/../vendor/autoload.php';

// Starting router helpers
require_once __DIR__.'/../vendor/pecee/simple-router/helpers.php';

// Loading routes file
require_once __DIR__.'/../routes/routes.php';

// Loading env
if(file_exists(__DIR__.'/etc/env.php')) {
    include __DIR__.'/env.php';
}

//Starting the app (routes, db, di and etc).
\Bootstrap\Bootstrap::run();

