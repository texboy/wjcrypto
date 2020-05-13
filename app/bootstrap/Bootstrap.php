<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

declare(strict_types = 1);

namespace Bootstrap;

use Exception;
use Pecee\Http\Middleware\Exceptions\TokenMismatchException;
use Pecee\SimpleRouter\Exceptions\HttpException;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;
use Bootstrap\Database;

class Bootstrap {

    /**
     * Initializing routes, helpers and dependency injection
     *
     * @param bool $allowRouter
     * @return void
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws TokenMismatchException
     * @throws Exception
     */
    public static function run(bool $allowRouter = true): void
    {
        //Starting dependency injection
        $container = (new \DI\ContainerBuilder())
            ->addDefinitions(__DIR__.'/../etc/di.php')
            ->useAutowiring(true)
            ->build();

        //Starting database
        $database = $container->get(Database::class);
        /** @var Database */
        $database->start();

        // Starting routes
        if ($allowRouter){
            //Enabling di on simple router
            SimpleRouter::enableDependencyInjection($container);
            SimpleRouter::start();
        }
    }
}
