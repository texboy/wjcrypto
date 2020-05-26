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
     * @var TransactionSave
     */
    private $transactionSave;

    /**
     * TransactionProcessor constructor.
     * @param TransactionValidator $transactionValidator
     * @param TransactionSave $transactionSave
     */
    public function __construct(
        TransactionValidator $transactionValidator,
        TransactionSave $transactionSave
    ) {
        $this->transactionValidator = $transactionValidator;
        $this->transactionSave = $transactionSave;
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
        return $this->transactionSave->save($requestData);
    }
}
