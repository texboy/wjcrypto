<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class CustomerRepository
 * @package Wjcrypto\Customer\Model
 */
class CustomerRepository implements CustomerRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getCustomer(int $id): Customer
    {
        return Customer::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getAllCustomers(): Collection
    {
        return Customer::all();
    }

    /**
     * @inheritDoc
     */
    public function saveCustomer(array $customerData): int
    {
        return Customer::create($customerData)->customer_id;
    }

    /**
     * @inheritDoc
     */
    public function updateCustomer(int $id, array $customerData): bool
    {
        return Customer::find($id)->update($customerData);
    }

    /**
     * @inheritDoc
     */
    public function deleteCustomer(int $id): bool
    {
        return Customer::find($id)->delete();
    }
}