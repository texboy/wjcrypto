<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccount\Model\Services;

use Pecee\Http\Request;
use Wjcrypto\Core\Model\ValidationException;

/**
 * Interface RegisterProcessorInterface
 * @package Wjcrypto\BankAccount\Model\Services
 */
interface RegisterProcessorInterface
{
    /**
     * @param array $requestData
     * @throws ValidationException
     * @throws Throwable
     * @return string
     */
    public function process(array $requestData): string;
}