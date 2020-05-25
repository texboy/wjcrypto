<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Core\Validation\ValidationException;

/**
 * Class RegisterProcessor
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
class RegisterProcessor
{
    /**
     * @var RegisterValidator
     */
    private $registerValidator;

    /**
     * @var RegisterSave
     */
    private $registerSave;

    /**
     * RegisterProcessor constructor.
     * @param RegisterValidator $registerValidator
     * @param RegisterSave $registerSave
     */
    public function __construct(
        RegisterValidator $registerValidator,
        RegisterSave $registerSave
    ) {
        $this->registerValidator = $registerValidator;
        $this->registerSave = $registerSave;
    }

    /**
     * @inheritDoc
     */
    public function process(array $requestData): string
    {
        $validationResult = $this->registerValidator->validate($requestData);
        if ($validationResult->isValid() === false) {
            throw new ValidationException($validationResult, "Validation Exception");
        }

        return $this->registerSave->save($requestData['user']);
    }
}