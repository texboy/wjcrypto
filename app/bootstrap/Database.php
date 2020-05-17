<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Bootstrap;

use Illuminate\Database\Capsule\Manager;

/**
 * Class Database
 * @package Bootstrap
 */
class Database {

    /**
     * @var Manager
     */
    private $eloquentManager;

    /**
     * Database constructor.
     * @param Manager $eloquentManager
     */
    public function __construct(
        Manager $eloquentManager
    ) {
        $this->eloquentManager = $eloquentManager;
    }

    public function start(): void
    {
        $this->eloquentManager->addConnection([
            "driver" => env('DB_DRIVER'),
            "host" => env('DB_HOST'),
            "database" => env('DB_DATABASE'),
            "username" => env('DB_USERNAME'),
            "password" => env('DB_PASSWORD')
        ]);

        //Make this Eloquent manager instance available globally.
        $this->eloquentManager->setAsGlobal();
        // Setup the Eloquent ORM.
        $this->eloquentManager->bootEloquent();
    }
}