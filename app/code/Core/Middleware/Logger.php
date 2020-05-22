<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Middleware;

use Pecee\Http\Input\InputHandler;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Core\Model\CoreLogger;

/**
 * Class ApiVerification
 * @package Wjcrypto\Router\Middleware
 */
class Logger implements IMiddleware
{
    /**
     * @var CoreLogger
     */
    private $logger;

    /**
     * @var InputHandler
     */
    private $inputHandler;

    /**
     * Logger constructor.
     * @param CoreLogger $logger
     * @param InputHandler $inputHandler
     */
    public function __construct(
        CoreLogger $logger,
        InputHandler $inputHandler
    ) {
        $this->logger = $logger;
        $this->inputHandler = $inputHandler;
    }


    /**
     * @param Request $request
     */
    public function handle(Request $request): void
    {
        $data = $this->inputHandler->all();
        if (isset($data['user']) && isset($data['user']['password'])) {
            unset($data['user']['password']);
        }

        $this->logger->info(json_encode($data));
    }
}
