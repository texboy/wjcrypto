<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Wjcrypto\Encryption\Traits\EncryptionTrait;

/**
 * Class Customer
 * @package Wjcrypto\Customer\Model
 */
class Customer extends Model
{
    Use EncryptionTrait;

    /**
     * @var string
     */
    protected $table = 'customer';

    /**
     * @var string
     */
    protected $primaryKey = 'customer_id';

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
        return $this->hasOne('customer');
    }
}
