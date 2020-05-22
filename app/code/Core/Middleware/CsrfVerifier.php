<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Middleware;

use Pecee\Http\Middleware\BaseCsrfVerifier;

/**
 * Class CsrfVerifier
 * @package Core\Middleware
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
