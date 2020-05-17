<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Wjcrypto\Encryption\Traits\EncryptionTrait;

/**
 * Class Customer
 * @package Wjcrypto\Customer\Model
 */
class User extends Model
{
    Use EncryptionTrait;

    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * @var string[]
     */
    protected $encryptable = [
        'username', 'password'
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'username', 'password'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return HasOne
     */
    public function customer(): HasOne
    {
        return $this->hasOne('Wjcrypto/Customer/Model/Customer');
    }
}
