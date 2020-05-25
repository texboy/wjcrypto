<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Model\Services\EditValidators;

use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;

/**
 * Class DocumentValidator
 * @package Wjcrypto\BankAccountEdit\Model\Services\EditValidators
 */
class DocumentValidator implements AccountValidatorInterface
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
        if (isset($requestData['user']['customer']['documents'])) {
            $errors[] = 'Document editing is not allowed. Remove the documents key';
        }

        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}