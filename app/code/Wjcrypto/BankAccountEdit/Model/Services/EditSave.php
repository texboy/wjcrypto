<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Model\Services;

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
     * @var CustomerAddressRepository
     */
    private $customerAddressRepository;

    /**
     * EditSave constructor.
     * @param UserRepository $userRepository
     * @param CustomerRepository $customerRepository
     * @param CustomerAddressRepository $customerAddressRepository
     */
    public function __construct(
        UserRepository $userRepository,
        CustomerRepository $customerRepository,
        CustomerAddressRepository $customerAddressRepository
    ) {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
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
        return $databaseConnection->transaction(function () use ($accountData) {
            $user = $this->userRepository->getById($accountData['user_id']);
            $this->userRepository->update($user->fill($accountData));
            $this->customerRepository->update($user->customer->fill($accountData['customer']));
            if (isset($accountData['customer']['customer_address'])) {
                foreach ($accountData['customer']['customer_address'] as $address) {
                    $customerAddress = $this->customerAddressRepository->getById($address['customer_address_id']);
                    $customerAddress->fill($address);
                    $this->customerAddressRepository->update($customerAddress);
                }
            }
            return 'Success';
        });
    }

}
