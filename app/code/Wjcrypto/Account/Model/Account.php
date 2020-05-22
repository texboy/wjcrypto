<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Account\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Wjcrypto\Encryption\Traits\EncryptionTrait;

/**
 * Class Customer
 * @package Wjcrypto\Customer\Model
 */
class Account extends Model
{
    use EncryptionTrait;

    /**
     * @var string
     */
    protected $table = 'account';

    /**
     * @var string
     */
    protected $primaryKey = 'account_id';

    /**
     * @var string[]
     */
    protected $encryptable = [
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'balance'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo('Wjcrypto/Customer/Model/Customer', 'customer_id', "customer_id");
    }
}
