<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Model\Services\EditValidators;

use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;

/**
 * Class UserValidator
 * @package Wjcrypto\BankAccountEdit\Model\Services\EditValidators
 */
class UserValidator implements AccountValidatorInterface
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
        $contextPhrase = 'User edit error: ';

        if (!isset($requestData['user'])) {
            $errors[] = $contextPhrase . 'missing "user" key';
        } elseif (!isset($requestData['user']['user_id'])) {
            $errors[] = $contextPhrase . 'missing "user_id" key';
        }

        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}