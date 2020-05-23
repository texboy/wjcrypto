<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Account\Model;

use Core\Model\BaseRepository;

/**
 * Class AccountRepository
 * @package Wjcrypto\Account\Model
 */
class AccountRepository extends BaseRepository
{
    /**
     * AccountRepository constructor.
     * @param Account $account
     */
    public function __construct(Account $account)
    {
        $this->entity = $account;
    }
}