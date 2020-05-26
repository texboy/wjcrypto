<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators;

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
        $contextPhrase = 'Customer creation error: ';
        if (!isset($requestData['user']['customer'])) {
            $errors[] =  $contextPhrase . 'missing "customer" key';
        } elseif (!isset($requestData['user']['customer']['name'])) {
            $errors[] =  $contextPhrase . 'missing "name" key';
        } elseif (!isset($requestData['user']['customer']['customer_type_id'])) {
            $errors[] =  $contextPhrase . 'missing "customer_type_id" key';
        } elseif (!isset($requestData['user']['customer']['dof'])) {
            $errors[] =  $contextPhrase . 'missing "dof" key';
        } elseif (!isset($requestData['user']['customer']['telephone'])) {
            $errors[] =  $contextPhrase . 'missing "telephone" key';
        }

        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}
