<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserRepositoryInterface
 * @package Wjcrypto\User\Model
 */
interface UserRepositoryInterface
{
    /**
     * @param int $id
     * @return User
     */
    public function getUser(int $id): User;

    /**
     * @return Collection
     */
    public function getAllUsers(): Collection;

    /**
     * @param array $userData
     * @return int
     */
    public function saveUser(array $userData): int;

    /**
     * @param int $id
     * @param array $userData
     * @return bool
     */
    public function updateUser(int $id, array $userData): bool;

    /**
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id): void;
}
