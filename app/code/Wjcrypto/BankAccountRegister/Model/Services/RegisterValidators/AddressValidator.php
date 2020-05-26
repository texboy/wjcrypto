<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators;

use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;

/**
 * Class AddressValidator
 * @package Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators
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
        $contextPhrase = 'Customer address creation error: ';
        if (!isset($requestData['user']['customer']['customer_address'])) {
            $errors[] = $contextPhrase . 'missing "customer_address" key';
        } else {
            foreach ($requestData['user']['customer']['customer_address'] as $address) {
                if (!isset($address['street'])) {
                    $errors[] = $contextPhrase . 'missing "street" key';
                }
                if (!isset($address['number'])) {
                    $errors[] = $contextPhrase . 'missing "number" key';
                }
                if (!isset($address['neighborhood'])) {
                    $errors[] = $contextPhrase . 'missing "neighborhood" key';
                }
                if (!isset($address['city'])) {
                    $errors[] = $contextPhrase . 'missing "city" key';
                }
                if (!isset($address['country'])) {
                    $errors[] = $contextPhrase . 'missing "country" key';
                }
                if (!isset($address['zipcode'])) {
                    $errors[] = $contextPhrase . 'missing "zipcode" key';
                }
            }
        }

        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}
