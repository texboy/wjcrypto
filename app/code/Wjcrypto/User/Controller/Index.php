<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Controller;

/**
 * Class Index
 * @package Wjcrypto\User\Controller
 */
class Index
{
    /**
     * @return string
     */
    public function postTest(): ?string
    {
        response()->json(
            ['test' => 'test']
        );
    }
}
