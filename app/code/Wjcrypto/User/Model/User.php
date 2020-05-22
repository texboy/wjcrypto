<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Core\Traits\EncryptionTrait;

/**
 * Class Customer
 * @package Wjcrypto\Customer\Model
 */
class User extends Model
{
    use EncryptionTrait;

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
        return $this->hasOne('Wjcrypto/Customer/Model/Customer', 'user_id', "user_id");
    }
}
