<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Router\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Wjcrypto\Router\Model\CoreLogger;

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
     * ApiController constructor.
     * @param CoreLogger $logger
     */
    public function __construct(CoreLogger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     */
    public function handle(Request $request): void
    {
        $data = input()->all();
        if (isset($data['password'])) {
            unset($data['password']);
        }
        $this->logger->info(json_encode($data));
    }
}
