<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators;

use Wjcrypto\BankAccountRegister\Model\Services\AccountValidatorInterface;
use Core\Validation\ValidationResult;
use Wjcrypto\User\Model\UserRepository;

/**
 * Class UserValidator
 * @package Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators
 */
class UserValidator implements AccountValidatorInterface
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserValidator constructor.
     * @param ValidationResult $validationResult
     * @param UserRepository $userRepository
     */
    public function __construct(
        ValidationResult $validationResult,
        UserRepository $userRepository
    ) {
        $this->validationResult = $validationResult;
        $this->userRepository = $userRepository;
    }


    /**
     * @inheritDoc
     */
    public function validate(array $requestData): ValidationResult
    {
        $errors = [];
        $contextPhrase = 'User creation error: ';

        if (!isset($requestData['user'])) {
            $errors[] = $contextPhrase . 'missing "user" key';
        } elseif (!isset($requestData['user']['username'])) {
            $errors[] = $contextPhrase . 'missing "username" key';
        } elseif (!isset($requestData['user']['password'])) {
            $errors[] = $contextPhrase . 'missing "password" key';
        }

        if (isset($requestData['user']['username'])) {
            if ($this->userRepository->usernameExists($requestData['user']['username'])) {
                $errors[] = $contextPhrase . 'username already taken';
            }
        }

        $this->validationResult->setErrors($errors);
        return $this->validationResult;
    }
}
