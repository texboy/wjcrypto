<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Core\Validation\ValidationResult;

/**
 * Class RegisterValidator
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
class RegisterValidator implements AccountValidatorInterface
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * @var AccountValidatorInterface[]
     */
    private $registerValidators;

    /**
     * RegisterValidator constructor.
     * @param ValidationResult $validationResult
     * @param AccountValidatorInterface[] $registerValidators
     */
    public function __construct(
        ValidationResult $validationResult,
        array $registerValidators = []
    ) {
        $this->validationResult = $validationResult;
        $this->registerValidators = $registerValidators;
    }

    /**
     * @inheritDoc
     */
    public function validate(array $requestData): ValidationResult
    {
        $errors = [];
        foreach ($this->registerValidators as $validator) {
            $validationResult = $validator->validate($requestData);
            if ($validationResult->isValid() === false) {
                $errors = array_merge($errors, $validationResult->getErrors());
            }
        }
        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}