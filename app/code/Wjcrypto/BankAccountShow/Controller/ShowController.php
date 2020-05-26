<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountShow\Controller;

use Core\Model\AccessLogger;
use Exception;
use Psr\Log\LogLevel;
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
     * @var AccessLogger
     */
    private $accessLogger;

    /**
     * ShowController constructor.
     * @param UserRepository $userRepository
     * @param AccessLogger $accessLogger
     */
    public function __construct(
        UserRepository $userRepository,
        AccessLogger $accessLogger
    ) {
        $this->userRepository = $userRepository;
        $this->accessLogger = $accessLogger;
    }


    /**
     * @param $id
     * @return string|null
     * @throws Exception
     */
    public function getUser($id): ?string
    {
        $response = $this->userRepository
            ->getById((int) $id, self::BANK_USER_ACCOUNT_RELATIONSHIPS)->toArray();
        $this->accessLogger->log(LogLevel::INFO, '');
        return response()->httpCode(200)->json([
            $response
        ]);
    }

    /**
     * @return string|null
     */
    public function getAllAccounts(): ?string
    {
        $reponse = $this->userRepository
            ->getAll(self::BANK_USER_ACCOUNT_RELATIONSHIPS)->toArray();
        $this->accessLogger->log(LogLevel::INFO, '');
        return response()->httpCode(200)->json([
           $reponse
        ]);
    }

    /**
     * @param $id
     * @return string|null
     * @throws Exception
     */
    public function getAccount($id): ?string
    {
        $reponse =  $this->userRepository
            ->getByAccountId((int) $id, self::BANK_USER_ACCOUNT_RELATIONSHIPS)->toArray();
        $this->accessLogger->log(LogLevel::INFO, '');
        return response()->httpCode(200)->json([
           $reponse
        ]);
    }

}
