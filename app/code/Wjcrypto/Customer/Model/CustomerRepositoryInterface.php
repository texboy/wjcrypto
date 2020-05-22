<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Model;

use Exception;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CustomerRepositoryInterface
 * @package Wjcrypto\Account\Model
 */
interface CustomerRepositoryInterface
{
    /**
     * @param int $id
     * @return Customer
     */
    public function getCustomer(int $id): Customer;

    /**
     * @return Collection
     */
    public function getAllCustomers(): Collection;

    /**
     * @param array $customerData
     * @return int
     */
    public function saveCustomer(array $customerData): int;

    /**
     * @param int $id
     * @param array $customerData
     * @return bool
     */
    public function updateCustomer(int $id, array $customerData): bool;

    /**
     * @param int $id
     * @throws Exception
     * @return bool
     */
    public function deleteCustomer(int $id): bool;
}
