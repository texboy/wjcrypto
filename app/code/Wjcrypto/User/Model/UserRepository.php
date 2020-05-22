<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserRepository
 * @package Wjcrypto\User\Model
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getUser(int $id): User
    {
        return User::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getAllUsers(): Collection
    {
        return User::all();
    }

    /**
     * @inheritDoc
     */
    public function saveUser(array $userData): int
    {
        return User::create($userData)->user_id;
    }

    /**
     * @inheritDoc
     */
    public function updateUser(int $id, array $userData): bool
    {
         return User::find($id)->update($userData);
    }

    /**
     * @inheritDoc
     */
    public function deleteUser(int $id): bool
    {
        return User::find($id)->delete();
    }
}