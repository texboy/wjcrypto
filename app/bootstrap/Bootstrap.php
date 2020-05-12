<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

declare(strict_types = 1);

namespace Bootstrap;

use Pecee\SimpleRouter\SimpleRouter;

class Bootstrap {

    /**
     * Initializing routes, helpers and dependency injection
     *
     * @return void
     * @throws \Pecee\Http\Middleware\Exceptions\TokenMismatchException
     * @throws \Pecee\SimpleRouter\Exceptions\HttpException
     * @throws \Pecee\SimpleRouter\Exceptions\NotFoundHttpException
     * @throws \Exception
     */
    public static function run(): void
    {
        //Starting dependency injection
        $container = (new \DI\ContainerBuilder())
            ->useAutowiring(true)
            ->build();
        SimpleRouter::enableDependencyInjection($container);

        // Starting routes
        SimpleRouter::start();
    }

}
