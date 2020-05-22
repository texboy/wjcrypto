<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccount\Model\Services;

use Pecee\Http\Request;
use Wjcrypto\Core\Model\ValidationException;

class RegisterProcessor implements RegisterProcessorInterface
{
    /**
     * @var RegisterValidatorInterface
     */
    private $registerValidator;

    /**
     * @var RegisterSaveInterface
     */
    private $registerSave;

    /**
     * RegisterProcessor constructor.
     * @param RegisterValidatorInterface $registerValidator
     * @param RegisterSaveInterface $registerSave
     */
    public function __construct(
        RegisterValidatorInterface $registerValidator,
        RegisterSaveInterface $registerSave
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