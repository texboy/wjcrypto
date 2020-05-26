<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Model\Services\EditValidators;

use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;

/**
 * Class AddressValidator
 * @package Wjcrypto\BankAccountEdit\Model\Services\RegisterValidators
 */
class AddressValidator implements AccountValidatorInterface
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
        $contextPhrase = 'Customer address edit error: ';
        if (isset($requestData['user']['customer']['customer_address'])) {
            foreach ($requestData['user']['customer']['customer_address'] as $address) {
                if (!isset($address['customer_address_id'])) {
                    $errors[] = $contextPhrase . 'missing "customer_address_id" key';
                }
            }
        }
        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}
