<?php

// Using composer autoloader hehe
require __DIR__ . '/../vendor/autoload.php';

// Starting router helpers
require_once __DIR__ . '/../vendor/pecee/simple-router/helpers.php';

// Loading routes file
require_once __DIR__ . '/../routes/routes.php';

//Starting the app (routes, db, di and etc).
\Bootstrap\Bootstrap::run();
