<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Model;

use Core\Model\BaseRepository;

/**
 * Class CustomerRepository
 * @package Wjcrypto\Customer\Model
 */
class CustomerRepository extends BaseRepository
{
    /**
     * CustomerRepository constructor.
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->entity = $customer;
    }
}