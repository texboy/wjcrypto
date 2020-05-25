<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Model\Services;

use Core\Validation\ValidationException;
use Wjcrypto\BankAccountEdit\Model\Services\EditValidator;

/**
 * Class EditProcessor
 * @package Wjcrypto\BankAccountEdit\Model\Services
 */
class EditProcessor
{
    /**
     * @var EditValidator
     */
    private $editValidator;

    /**
     * @var EditSave
     */
    private $editSave;

    /**
     * RegisterProcessor constructor.
     * @param EditValidator $editValidator
     * @param EditSave $editSave
     */
    public function __construct(
        EditValidator $editValidator,
        EditSave $editSave
    ) {
        $this->editValidator = $editValidator;
        $this->editSave = $editSave;
    }

    /**
     * @inheritDoc
     * @throws ValidationException
     */
    public function process(array $requestData): string
    {
        $validationResult = $this->editValidator->validate($requestData);
        if ($validationResult->isValid() === false) {
            throw new ValidationException($validationResult, "Validation Exception");
        }

        return $this->editSave->save($requestData['user']);
    }
}