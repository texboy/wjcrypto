<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountShow\Controller;

use Exception;
use Wjcrypto\Account\Model\AccountRepository;
use Wjcrypto\User\Model\UserRepository;

/**
 * Class ShowController
 * @package Wjcrypto\BankAccountShow\Controller
 */
class ShowController
{
    public const BANK_USER_ACCOUNT_RELATIONSHIPS = [
        'customer.customerType',
        'customer.account',
        'customer.customerAddress',
        'customer.document.documentType'
    ];

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var AccountRepository;
     */

    /**
     * ShowController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @param $id
     * @return string|null
     * @throws Exception
     */
    public function getUser($id): ?string
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

    /**
     * @param $id
     * @return string|null
     * @throws Exception
     */
    public function getAccount($id): ?string
    {
        return response()->httpCode(200)->json([
            $this->userRepository
                ->getByAccountId((int) $id, self::BANK_USER_ACCOUNT_RELATIONSHIPS)->toArray()
        ]);
    }

}
