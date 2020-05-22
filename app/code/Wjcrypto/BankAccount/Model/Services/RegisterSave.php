<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccount\Model\Services;

use Wjcrypto\Account\Model\AccountRepositoryInterface;
use Wjcrypto\Customer\Model\CustomerRepositoryInterface;
use Wjcrypto\Document\Model\DocumentRepositoryInterface;
use Wjcrypto\User\Model\UserRepositoryInterface;

/**
 * Class RegisterSave
 * @package Wjcrypto\BankAccount\Model\Services
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
        $databaseConnection = $this->userRepository->getDatabaseConnection();
        $user = $accountData;
        $customer = $user['customer'];
        $documents = $customer['documents'];

        return $databaseConnection->transaction(
            function () use ($user, $customer, $documents) {
                $customer['user_id'] = $this->userRepository->saveUser($user);
                $customerId = $this->customerRepository->saveCustomer($customer);
                $this->createDocument($documents, $customerId);
                $accountNumber = $this->accountRepository->saveAccount($customerId);
                return 'New account number: ' . $accountNumber;
            }
        );
    }

    /**
     * @param $documents
     * @param $customer_id
     */
    private function createDocument($documents, $customer_id)
    {
        foreach ($documents as $document) {
             $document['customer_id'] = $customer_id;
             $this->documentRepository->saveDocument($document);
        }
    }
}
