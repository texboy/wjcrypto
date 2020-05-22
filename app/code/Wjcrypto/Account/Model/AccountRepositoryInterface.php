<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Account\Model;

use Exception;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface AccountRepositoryInterface
 * @package Wjcrypto\Account\Model
 */
interface AccountRepositoryInterface
{
    /**
     * @param int $id
     * @return Account
     */
    public function getAccount(int $id): Account;

    /**
     * @return Collection
     */
    public function getAllAccounts(): Collection;

    /**
     * @param int $customerId
     * @return int
     */
    public function saveAccount(int $customerId): int;

    /**
     * @param int $id
     * @param array $accountData
     * @return bool
     */
    public function updateAccount(int $id, array $accountData): bool;

    /**
     * @param int $id
     * @throws Exception
     * @return bool
     */
    public function deleteAccount(int $id): bool;
}
