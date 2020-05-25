<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Model\Services;

use Core\Validation\ValidationException;

/**
 * Class RegisterProcessor
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
class TransactionProcessor
{
    /**
     * @var TransactionValidator
     */
    private $transactionValidator;

    /**
     * TransactionProcessor constructor.
     * @param TransactionValidator $transactionValidator
     */
    public function __construct(TransactionValidator $transactionValidator)
    {
        $this->transactionValidator = $transactionValidator;
    }

    /**
     * @param array $requestData
     * @return string
     * @throws ValidationException
     */
    public function process(array $requestData): string
    {
        $validationResult = $this->transactionValidator->validate($requestData);
        if ($validationResult->isValid() === false) {
            throw new ValidationException($validationResult, "Validation Exception");
        }

        return 'top';
    }
}