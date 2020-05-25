<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Account\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Core\Traits\EncryptionTrait;
use Wjcrypto\Customer\Model\Customer;

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
        'balance'
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'balance','customer_id'
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
        return $this->belongsTo(Customer::class, 'customer_id', "customer_id");
    }
}
