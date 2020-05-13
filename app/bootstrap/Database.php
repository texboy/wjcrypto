<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

declare(strict_types=1);

namespace Bootstrap;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Encryption\Encrypter;

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
            "driver" => "mysql",
            "host" =>"db",
            "database" => "wjcrypto",
            "username" => "root",
            "password" => "100senha"
        ]);

        //Make this Eloquent manager instance available globally.
        $this->eloquentManager->setAsGlobal();
        // Setup the Eloquent ORM.
        $this->eloquentManager->bootEloquent();
    }
}