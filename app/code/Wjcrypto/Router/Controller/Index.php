<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Router\Controller;

class Index
{
    public function notFound(): string
    {
        return print_r(getenv());
        return 'Page not found';
    }
}