<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Model;

use Core\Model\BaseRepository;

/**
 * Class CustomerTypeRepository
 * @package Wjcrypto\Customer\Model
 */
class CustomerTypeRepository extends BaseRepository
{
    /**
     * CustomerTypeRepository constructor.
     * @param CustomerType $customerType
     */
    public function __construct(CustomerType $customerType)
    {
        $this->entity = $customerType;
    }
}