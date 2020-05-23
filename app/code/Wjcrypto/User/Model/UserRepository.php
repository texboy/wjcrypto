<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Model;

use Core\Model\BaseRepository;

/**
 * Class UserRepository
 * @package Wjcrypto\User\Model
 */
class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->entity = $user;
    }
}