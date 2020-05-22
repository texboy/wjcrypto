<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Pecee\Http\Request;
use Wjcrypto\Core\Model\ValidationResult;

interface RegisterValidatorInterface
{
    /**
     * @param array $requestData
     * @return ValidationResult
     */
    public function validate(array $requestData): ValidationResult;
}