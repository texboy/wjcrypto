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
        $contextPhrase = 'Document creation error: ';
        if (!isset($requestData['user']['customer']['documents'])) {
            $errors[] = $contextPhrase . 'missing "documents" key';
        } else {
            foreach ($requestData['user']['customer']['documents'] as $document) {
                if (!isset($document['document_number'])) {
                    $errors[] = $contextPhrase . 'missing "documents_number" key';
                }
                if (!isset($document['document_type_id'])) {
                    $errors[] = $contextPhrase . 'missing "document_type_id" key';
                }
            }
        }

        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}