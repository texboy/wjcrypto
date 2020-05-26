<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Model;

use Core\Model\BaseRepository;
use Core\Model\Encryption;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Bool_;

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

    /**
     * @param $accountId
     * @param array|string[] $relationships
     * @return Model
     */
    public function getByAccountId($accountId, array $relationships = ['customer.account']): Model
    {
        return $this->entity->whereHas('customer.account', function ($query) use ($accountId) {
            $query->where('account_id', '=', $accountId);
        })->with($relationships)->get()->first() ;
    }

    /**
     * @param $username
     * @param array $relationships
     * @return Model
     */
    public function getByUsername($username, array $relationships): Model
    {
        return $this->entity->where('username', $username)->first();
    }

    /**
     * @param $username
     * @return bool
     */
    public function usernameExists($username): bool
    {
        return $this->entity->get()->filter(function ($user) use ($username) {
            return $user->username == $username;
        })->isNotEmpty();
    }
}