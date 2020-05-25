<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Core\Validation\ValidationResult;

/**
 * Interface RegisterValidatorInterface
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
interface AccountValidatorInterface
{
    /**
     * @param array $requestData
     * @return ValidationResult
     */
    public function validate(array $requestData): ValidationResult;
}