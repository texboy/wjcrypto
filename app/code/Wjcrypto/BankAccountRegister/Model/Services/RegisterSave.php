<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

use Throwable;
use Wjcrypto\Account\Model\AccountRepository;
use Wjcrypto\Customer\Model\CustomerRepository;
use Wjcrypto\CustomerAddress\Model\CustomerAddressRepository;
use Wjcrypto\Document\Model\DocumentRepository;
use Wjcrypto\User\Model\UserRepository;

/**
 * Class RegisterSave
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
class RegisterSave
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
     * @var CustomerAddressRepository
     */
    private $customerAddressRepository;

    /**
     * RegisterSave constructor.
     * @param UserRepository $userRepository
     * @param CustomerRepository $customerRepository
     * @param DocumentRepository $documentRepository
     * @param AccountRepository $accountRepository
     * @param CustomerAddressRepository $customerAddressRepository
     */
    public function __construct(
        UserRepository $userRepository,
        CustomerRepository $customerRepository,
        DocumentRepository $documentRepository,
        AccountRepository $accountRepository,
        CustomerAddressRepository $customerAddressRepository
    ) {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
        $this->documentRepository = $documentRepository;
        $this->accountRepository = $accountRepository;
        $this->customerAddressRepository = $customerAddressRepository;
    }


    /**
     * @param array $accountData
     * @return string
     * @throws Throwable
     */
    public function save(array $accountData): string
    {
        $databaseConnection = $this->userRepository->getDatabaseConnection();
        $user = $accountData;
        $customer = $user['customer'];
        $documents = $customer['documents'];
        $addresses = $customer['customer_address'];

        return $databaseConnection->transaction(function () use ($user, $customer, $documents, $addresses) {
            $customer['user_id'] = $this->userRepository->save($user)->user_id;
            $customerId = $this->customerRepository->save($customer)->customer_id;
            $this->createDocument($documents, $customerId);
            $this->createAddress($addresses, $customerId);
            $accountNumber = $this->accountRepository->save([
                'customer_id' => $customerId,
                'balance' => '0'
                ])->account_id;
            return 'New account number: ' . $accountNumber;
        });
    }

    /**
     * @param $documents
     * @param $customer_id
     */
    private function createDocument($documents, $customerId): void
    {
        foreach ($documents as $document) {
             $document['customer_id'] = $customerId;
             $this->documentRepository->save($document);
        }
    }

    private function createAddress($addresses, $customerId): void
    {
        foreach ($addresses as $address) {
            $address['customer_id'] = $customerId;
            $this->customerAddressRepository->save($address);
        }
    }
}
