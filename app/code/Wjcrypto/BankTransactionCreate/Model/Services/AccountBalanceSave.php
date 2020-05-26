<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Model\Services;

use Wjcrypto\Account\Model\AccountRepository;

/**
 * Class AccountBalanceSave
 * @package Wjcrypto\BankTransactionCreate\Model\Services
 */
class AccountBalanceSave
{

    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * AccountBalanceSave constructor.
     * @param AccountRepository $accountRepository
     */
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * @param array $requestData
     * @return bool
     */
    public function saveBalanceTransaction(array $requestData): bool
    {
        $sender = $this->accountRepository->getById($requestData['transaction']['sender_account_id']);
        $receiver = $this->accountRepository->getById($requestData['transaction']['receiver_account_id']);

        return true;
    }
}
