<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Router\Middleware;

use Pecee\Http\Middleware\BaseCsrfVerifier;

/**
 * Class CsrfVerifier
 * @package Wjcrypto\Router\Middleware
 */
class CsrfVerifier extends BaseCsrfVerifier
{
    /**
     * CSRF validation will be ignored on the following urls.
     *
     * @var string[]
     */
	protected $except = ['/api/*'];

}