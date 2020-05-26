<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators;

use Exception;
use Wjcrypto\Account\Model\AccountRepository;
use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;
use Wjcrypto\Transaction\Model\TransactionType;
use Wjcrypto\Transaction\Model\TransactionTypeRepository;

/**
 * Class AccountBalanceValidator
 * @package Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators
 */
class AccountBalanceValidator implements AccountValidatorInterface
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
     * @var TransactionTypeRepository
     */
    private $transactionTypeRepository;

    /**
     * AccountBalanceValidator constructor.
     * @param ValidationResult $validationResult
     * @param AccountRepository $accountRepository
     * @param TransactionTypeRepository $transactionTypeRepository
     */
    public function __construct(
        ValidationResult $validationResult,
        AccountRepository $accountRepository,
        TransactionTypeRepository $transactionTypeRepository
    ) {
        $this->validationResult = $validationResult;
        $this->accountRepository = $accountRepository;
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

        if (isset($requestData['transaction']['sender_account_id']) && !$this->isDeposit($requestData)) {
            $sender = $this->accountRepository->getById($requestData['transaction']['sender_account_id']);
            if ((float) $sender->balance < (float) $requestData['transaction']['amount']) {
                $errors[] = $contextPhrase . 'sender has an insufficient balance value';
            }
        }
        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }

    /**
     * @param $requestData
     * @return bool
     * @throws Exception
     */
    private function isDeposit($requestData): bool
    {
        $transactionTypeId = $requestData['transaction']['transaction_type_id'];
        $transactionType = $this->transactionTypeRepository->getById($transactionTypeId);
        $isDeposit = false;
        if ($transactionType->value == TransactionType::TRANSACTION_TYPE_DEPOSIT) {
            $isDeposit = true;
        }
        return $isDeposit;
    }
}
