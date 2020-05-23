<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountUser\Controller;

use Exception;
use Pecee\Http\Input\InputHandler;
use Throwable;
use Wjcrypto\BankAccountRegister\Model\Services\RegisterProcessorInterface;
use Core\Validation\ValidationException;
use Wjcrypto\Customer\Model\CustomerRepository;
use Wjcrypto\User\Model\UserRepository;

/**
 * Class RegisterController
 * @package Wjcrypto\BankAccountRegister\Controller
 */
class AccountUserController
{
    public const BANK_USER_ACCOUNT_RELATIONSHIPS = [
        'customer.customerType',
        'customer.account',
        'customer.document.documentType'
    ];

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * AccountUserController constructor.
     * @param UserRepository $userRepository
     * @param CustomerRepository $customerRepository
     */
    public function __construct(
        UserRepository $userRepository,
        CustomerRepository $customerRepository
    ) {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
    }


    /**
     * @param $id
     * @return string|null
     * @throws Exception
     */
    public function getAccount($id): ?string
    {
        return response()->httpCode(200)->json([
            $this->userRepository
                ->getById((int) $id, self::BANK_USER_ACCOUNT_RELATIONSHIPS)->toArray()
        ]);
    }

    /**
     * @return string|null
     */
    public function getAllAccounts(): ?string
    {
        return response()->httpCode(200)->json([
            $this->userRepository
                ->getAll(self::BANK_USER_ACCOUNT_RELATIONSHIPS)->toArray()
        ]);
    }
}
