<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Pecee\Http\Request;
use Wjcrypto\Core\Model\ValidationException;

/**
 * Interface RegisterProcessorInterface
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
interface RegisterProcessorInterface
{
    /**
     * @param array $requestData
     * @throws ValidationException
     * @return string
     */
    public function process(array $requestData): string;
}