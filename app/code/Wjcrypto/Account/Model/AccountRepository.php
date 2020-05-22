<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Account\Model;

use Illuminate\Database\Eloquent\Collection;

class AccountRepository implements AccountRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getAccount(int $id): Account
    {
        return Account::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getAllAccounts(): Collection
    {
        return Account::all();
    }

    /**
     * @inheritDoc
     */
    public function saveAccount(int $customerId): int
    {
        return Account::create([
            'customer_id' => $customerId,
            'balance' => 0.0
        ])->account_id;
    }

    /**
     * @inheritDoc
     */
    public function updateAccount(int $id, array $accountData): bool
    {
        return Account::find($id)->update($accountData);
    }

    /**
     * @inheritDoc
     */
    public function deleteAccount(int $id): bool
    {
        return Account::find($id)->delete();
    }
}