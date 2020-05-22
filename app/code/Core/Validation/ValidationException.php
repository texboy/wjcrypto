<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Validation;

use Throwable;

/**
 * Class ValidationException
 * @package Core\Validation
 */
class ValidationException extends \Exception
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * ValidationException constructor.
     * @param ValidationResult $validationResult
     * @param string $message
     * @param int $code
     * @param Throwable $previous
     */
    public function __construct(
        ValidationResult $validationResult,
        $message = "",
        $code = 0,
        Throwable $previous = null
    ) {
        $this->validationResult = $validationResult;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        $errors = [];
        if (null !== $this->validationResult) {
            foreach ($this->validationResult->getErrors() as $error) {
                $errors[] = new \Exception($error);
            }
        }
        return $errors;
    }
}
