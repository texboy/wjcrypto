<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Model\Services;

use Core\Validation\ValidationResult;
use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;

/**
 * Class RegisterValidator
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
class EditValidator implements AccountValidatorInterface
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * @var AccountValidatorInterface[]
     */
    private $editValidators;

    /**
     * RegisterValidator constructor.
     * @param ValidationResult $validationResult
     * @param AccountValidatorInterface[] $editValidators
     */
    public function __construct(
        ValidationResult $validationResult,
        array $editValidators = []
    ) {
        $this->validationResult = $validationResult;
        $this->editValidators = $editValidators;
    }

    /**
     * @inheritDoc
     */
    public function validate(array $requestData): ValidationResult
    {
        $errors = [];
        foreach ($this->editValidators as $validator) {
            $validationResult = $validator->validate($requestData);
            if ($validationResult->isValid() === false) {
                $errors = array_merge($errors, $validationResult->getErrors());
            }
        }
        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}