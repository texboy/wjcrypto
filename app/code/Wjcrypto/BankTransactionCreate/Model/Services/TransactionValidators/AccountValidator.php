<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators;

use Exception;
use Wjcrypto\Account\Model\AccountRepository;
use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;

/**
 * Class AccountValidator
 * @package Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators
 */
class AccountValidator implements AccountValidatorInterface
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * AccountValidator constructor.
     * @param ValidationResult $validationResult
     * @param AccountRepository $accountRepository
     */
    public function __construct(
        ValidationResult $validationResult,
        AccountRepository $accountRepository
    ) {
        $this->validationResult = $validationResult;
        $this->accountRepository = $accountRepository;
    }


    /**
     * @inheritDoc
     * @throws Exception
     */
    public function validate(array $requestData): ValidationResult
    {
        $errors = [];
        if (isset($requestData['transaction']['sender_account_id'])) {
            $this->accountRepository->getById($requestData['transaction']['sender_account_id']);
        }

        if (isset($requestData['transaction']['receiver_account_id'])) {
            $this->accountRepository->getById($requestData['transaction']['receiver_account_id']);
        }
        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}