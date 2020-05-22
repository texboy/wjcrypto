<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Core\Validation\ValidationResult;

interface RegisterValidatorInterface
{
    /**
     * @param array $requestData
     * @return ValidationResult
     */
    public function validate(array $requestData): ValidationResult;
}