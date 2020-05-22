<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccount\Model\Services\RegisterValidators;

use Wjcrypto\BankAccountRegister\Model\Services\RegisterValidatorInterface;
use Wjcrypto\Core\Model\ValidationResult;

/**
 * Class CustomerValidator
 * @package Wjcrypto\BankAccount\Model\Services\RegisterValidators
 */
class UserValidator implements RegisterValidatorInterface
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * CustomerValidator constructor.
     * @param ValidationResult $validationResult
     */
    public function __construct(ValidationResult $validationResult)
    {
        $this->validationResult = $validationResult;
    }

    /**
     * @inheritDoc
     */
    public function validate(array $requestData): ValidationResult
    {
        $errors = [];
        $contextPhrase = 'User creation error: ';
        if (!isset($requestData['user'])) {
            $errors[] = $contextPhrase . 'missing "user" key';
        } elseif (!isset($requestData['user']['username'])) {
            $errors[] = $contextPhrase . 'missing "username" key';
        } elseif (!isset($requestData['user']['password'])) {
            $errors[] = $contextPhrase . 'missing "password" key';
        }

        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}