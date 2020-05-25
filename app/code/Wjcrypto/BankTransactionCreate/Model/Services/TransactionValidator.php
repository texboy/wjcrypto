<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Model\Services;

use Core\Validation\ValidationResult;
use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;

/**
 * Class RegisterValidator
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
class TransactionValidator implements AccountValidatorInterface
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * @var AccountValidatorInterface[]
     */
    private $transactionValidators;

    /**
     * RegisterValidator constructor.
     * @param ValidationResult $validationResult
     * @param AccountValidatorInterface[] $transactionValidators
     */
    public function __construct(
        ValidationResult $validationResult,
        array $transactionValidators = []
    ) {
        $this->validationResult = $validationResult;
        $this->transactionValidators = $transactionValidators;
    }

    /**
     * @inheritDoc
     */
    public function validate(array $requestData): ValidationResult
    {
        $errors = [];
        foreach ($this->transactionValidators as $validator) {
            $validationResult = $validator->validate($requestData);
            if ($validationResult->isValid() === false) {
                $errors = array_merge($errors, $validationResult->getErrors());
            }
        }
        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}