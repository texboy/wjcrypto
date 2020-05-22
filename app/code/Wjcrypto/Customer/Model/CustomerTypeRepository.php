<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Model;

use Illuminate\Database\Eloquent\Collection;

class CustomerTypeRepository implements CustomerTypeRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getCustomerType(int $id): CustomerType
    {
        return CustomerType::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getAllCustomerTypes(): Collection
    {
        return CustomerType::all();
    }

    /**
     * @inheritDoc
     */
    public function saveCustomerType(array $customerTypeData): int
    {
        return CustomerType::create($customerTypeData)->customer_type_id;
    }

    /**
     * @inheritDoc
     */
    public function updateCustomerType(int $id, array $customerTypeData): bool
    {
        return CustomerType::find($id)->update($customerTypeData);
    }

    /**
     * @inheritDoc
     */
    public function deleteCustomerType(int $id): bool
    {
        return CustomerType::find($id)->delete();
    }
}