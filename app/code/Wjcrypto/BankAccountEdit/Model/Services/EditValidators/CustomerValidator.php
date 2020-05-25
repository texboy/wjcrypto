<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Model\Services\EditValidators;

use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;

/**
 * Class CustomerValidator
 * @package Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators
 */
class CustomerValidator implements AccountValidatorInterface
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
        $contextPhrase = 'Customer edit error: ';
        if (!isset($requestData['user']['customer'])) {
            $errors[] =  $contextPhrase . 'missing "customer" key';
        } elseif (!isset($requestData['user']['customer']['name'])) {
            $errors[] =  $contextPhrase . 'missing "name" key';
        } elseif (isset($requestData['user']['customer']['customer_type_id'])) {
            $errors[] =  $contextPhrase . 'customer type edit not allowed. Remove "customer_type_id" key';
        }

        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}