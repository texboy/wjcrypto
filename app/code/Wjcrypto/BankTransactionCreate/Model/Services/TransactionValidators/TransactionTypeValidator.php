<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators;

use Exception;
use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;
use Wjcrypto\Transaction\Model\TransactionTypeRepository;

/**
 * Class TransactionTypeValidator
 * @package Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators
 */
class TransactionTypeValidator implements AccountValidatorInterface
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * @var TransactionTypeRepository
     */
    private $transactionTypeRepository;

    /**
     * TransactionTypeValidator constructor.
     * @param ValidationResult $validationResult
     * @param TransactionTypeRepository $transactionTypeRepository
     */
    public function __construct(
        ValidationResult $validationResult,
        TransactionTypeRepository $transactionTypeRepository
    ) {
        $this->validationResult = $validationResult;
        $this->transactionTypeRepository = $transactionTypeRepository;
    }


    /**
     * @inheritDoc
     * @throws Exception
     */
    public function validate(array $requestData): ValidationResult
    {
        $errors = [];
        $contextPhrase = 'Transaction creation error: ';
        if (isset($requestData['transaction']['transaction_type_id'])) {
            $this->transactionTypeRepository->getById($requestData['transaction']['transaction_type_id']);
        }
        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}