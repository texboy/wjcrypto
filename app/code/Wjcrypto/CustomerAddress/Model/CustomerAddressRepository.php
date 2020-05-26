<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\CustomerAddress\Model;

use Core\Model\BaseRepository;

/**
 * Class CustomerRepository
 * @package Wjcrypto\Customer\Model
 */
class CustomerAddressRepository extends BaseRepository
{
    /**
     * CustomerRepository constructor.
     * @param CustomerAddress $customerAddress
     */
    public function __construct(CustomerAddress $customerAddress)
    {
        $this->entity = $customerAddress;
    }
}
