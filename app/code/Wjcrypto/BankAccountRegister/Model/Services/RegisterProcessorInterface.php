<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Core\Validation\ValidationException;
use Throwable;

/**
 * Interface RegisterProcessorInterface
 * @package Wjcrypto\BankAccountRegister\Model\Services
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