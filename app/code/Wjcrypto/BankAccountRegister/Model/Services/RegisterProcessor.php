<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Pecee\Http\Request;
use Wjcrypto\Core\Model\ValidationException;

class RegisterProcessor implements RegisterProcessorInterface
{
    /**
     * @var RegisterValidatorInterface
     */
    private $registerValidator;

    /**
     * RegisterProcessor constructor.
     * @param RegisterValidatorInterface $registerValidator
     */
    public function __construct(RegisterValidatorInterface $registerValidator)
    {
        $this->registerValidator = $registerValidator;
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


        return "Success";
    }
}