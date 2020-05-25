<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Model\Services;

use Throwable;
use Wjcrypto\Account\Model\AccountRepository;
use Wjcrypto\Customer\Model\CustomerRepository;
use Wjcrypto\Document\Model\DocumentRepository;
use Wjcrypto\User\Model\UserRepository;

/**
 * Class RegisterSave
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
class EditSave
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * @var DocumentRepository
     */
    private $documentRepository;

    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * RegisterSave constructor.
     * @param UserRepository $userRepository
     * @param CustomerRepository $customerRepository
     * @param DocumentRepository $documentRepository
     * @param AccountRepository $accountRepository
     */
    public function __construct(
        UserRepository $userRepository,
        CustomerRepository $customerRepository,
        DocumentRepository $documentRepository,
        AccountRepository $accountRepository
    ) {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
        $this->documentRepository = $documentRepository;
        $this->accountRepository = $accountRepository;
    }


    /**
     * @param array $accountData
     * @return string
     * @throws Throwable
     */
    public function save(array $accountData): string
    {
        $databaseConnection = $this->userRepository->getDatabaseConnection();
        return $databaseConnection->transaction(function () use ($accountData) {
            $user = $this->userRepository->getById($accountData['user_id']);
            $this->userRepository->update($user->fill($accountData));
            $this->customerRepository->update($user->customer->fill($accountData['customer']));
            return 'Success';
        });
    }
}
