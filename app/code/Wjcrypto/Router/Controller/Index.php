<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Router\Controller;

/**
 * Class Index
 * @package Wjcrypto\Router\Controller
 */
class Index
{
    /**
     * @return string
     */
    public function notFound(): string
    {
        return 'Page not found';
    }
}
