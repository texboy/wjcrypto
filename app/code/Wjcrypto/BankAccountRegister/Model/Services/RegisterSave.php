<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Wjcrypto\Account\Model\AccountRepositoryInterface;
use Wjcrypto\Customer\Model\CustomerRepositoryInterface;
use Wjcrypto\Document\Model\DocumentRepositoryInterface;
use Wjcrypto\User\Model\UserRepositoryInterface;

/**
 * Class RegisterSave
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
class RegisterSave implements RegisterSaveInterface
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * @var DocumentRepositoryInterface
     */
    private $documentRepository;

    /**
     * @var AccountRepositoryInterface
     */
    private $accountRepository;

    /**
     * RegisterSave constructor.
     * @param UserRepositoryInterface $userRepository
     * @param CustomerRepositoryInterface $customerRepository
     * @param DocumentRepositoryInterface $documentRepository
     * @param AccountRepositoryInterface $accountRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        CustomerRepositoryInterface $customerRepository,
        DocumentRepositoryInterface $documentRepository,
        AccountRepositoryInterface $accountRepository
    ) {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
        $this->documentRepository = $documentRepository;
        $this->accountRepository = $accountRepository;
    }


    /**
     * @inheritDoc
     */
    public function save(array $accountData): string
    {
        
        $this->userRepository->saveUser()
    }
}