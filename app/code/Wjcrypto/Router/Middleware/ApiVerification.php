<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Router\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

/**
 * Class ApiVerification
 * @package Wjcrypto\Router\Middleware
 */
class ApiVerification implements IMiddleware
{
    /**
     * @param Request $request
     */
	public function handle(Request $request) : void
	{
		// Do authentication
		$request->authenticated = true;
	}

}