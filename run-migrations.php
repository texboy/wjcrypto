<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

// Using composer autoloader hehe
require __DIR__.'/vendor/autoload.php';

//Starting the app (routes, di and etc).
\Bootstrap\Bootstrap::run(false);
array_shift($argv);
try{
    if(count($argv)){
        foreach ($argv as $filename){
            require_once 'migrations/' . $filename;
        }
    } else {
        foreach (glob("migrations/*") as $filename) {
            require_once $filename;
        }
    }
}catch (\PDOException $e){
    echo $e->getMessage();
}



