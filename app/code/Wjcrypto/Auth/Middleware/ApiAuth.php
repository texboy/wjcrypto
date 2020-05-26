<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Auth\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

/**
 * Class ApiVerification
 * @package Wjcrypto\Router\Middleware
 */
class ApiAuth implements IMiddleware
{
    /**
     * @param Request $request
     */
    public function handle(Request $request): void
    {
        $header = $request->getHeader('Authorization');
        $credentials = base64_decode($header);

//        // Do authentication
//        if (true) {
//           $isAuthorized = false;
//        }
//        $request->authenticated = $isAuthorized;
//        $request->setRewriteUrl('/auth');
    }
}
