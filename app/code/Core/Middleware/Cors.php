<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

/**
 * Class Cors
 * @package Core\Middleware
 */
class Cors implements IMiddleware
{
    /**
     * @param Request $request
     */
    public function handle(Request $request): void
    {
        $headerValue = $request->getHeader('HTTP_ORIGIN');
        if (is_null($request->getHeader('HTTP_ORIGIN'))) {
            $headerValue = '*';
        }
        response()->header('Access-Control-Allow-Origin: ' . $headerValue);
    }
}
