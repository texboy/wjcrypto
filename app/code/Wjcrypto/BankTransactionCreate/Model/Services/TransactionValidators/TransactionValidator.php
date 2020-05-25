<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators;

use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;

/**
 * Class CustomerValidator
 * @package Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators
 */
class TransactionValidator implements AccountValidatorInterface
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * CustomerValidator constructor.
     * @param ValidationResult $validationResult
     */
    public function __construct(
        ValidationResult $validationResult
    ) {
        $this->validationResult = $validationResult;
    }


    /**
     * @inheritDoc
     */
    public function validate(array $requestData): ValidationResult
    {
        $errors = [];
        $contextPhrase = 'Transaction creation error: ';
        if (!isset($requestData['transaction'])) {
            $errors[] =  $contextPhrase . 'missing "transaction" key';
        } elseif (!isset($requestData['transaction']['sender_account_id'])) {
            $errors[] =  $contextPhrase . 'missing "sender_account_id" key';
        } elseif (!isset($requestData['transaction']['receiver_account_id'])) {
            $errors[] =  $contextPhrase . 'missing "receiver_account_id" key';
        } elseif (!isset($requestData['transaction']['amount'])) {
            $errors[] = $contextPhrase . 'missing "amount" key';
        } elseif (!isset($requestData['transaction']['transaction_type_id'])) {
            $errors[] = $contextPhrase . 'missing "transaction_type_id" key';
        }

        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}