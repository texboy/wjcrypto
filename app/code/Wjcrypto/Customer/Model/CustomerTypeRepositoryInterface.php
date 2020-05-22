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
interface CustomerTypeRepositoryInterface
{
    /**
     * @param int $id
     * @return CustomerType
     */
    public function getCustomerType(int $id): CustomerType;

    /**
     * @return Collection
     */
    public function getAllCustomerTypes(): Collection;

    /**
     * @param array $customerTypeData
     * @return int
     */
    public function saveCustomerType(array $customerTypeData): int;

    /**
     * @param int $id
     * @param array $customerTypeData
     * @return bool
     */
    public function updateCustomerType(int $id, array $customerTypeData): bool;

    /**
     * @param int $id
     * @throws Exception
     * @return bool
     */
    public function deleteCustomerType(int $id): bool;
}
