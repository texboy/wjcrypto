<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Core\Model;

/**
 * Copied from magento 2 hehe
 *
 * Class ValidationResult
 * @package Wjcrypto\Core\Model\Validation
 */
class ValidationResult
{
    /**
     * @var array
     */
    private $errors = [];

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     * @return void
     */
    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }
}
