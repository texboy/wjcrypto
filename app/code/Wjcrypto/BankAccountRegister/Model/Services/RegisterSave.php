<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Wjcrypto\Account\Model\AccountRepository;
use Wjcrypto\Customer\Model\CustomerRepository;
use Wjcrypto\Document\Model\DocumentRepository;
use Wjcrypto\User\Model\UserRepository;

/**
 * Class RegisterSave
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
class RegisterSave implements RegisterSaveInterface
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
                $customer['user_id'] = $this->userRepository->save($user)->user_id;
                $customerId = $this->customerRepository->save($customer)->customer_id;
                $this->createDocument($documents, $customerId);
                $accountNumber = $this->accountRepository->save([
                    'customer_id' => $customerId,
                    'balance' => '0'
                    ])->account_id;
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
             $this->documentRepository->save($document);
        }
    }
}
