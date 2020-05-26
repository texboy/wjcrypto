<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\CustomerAddress\Model;

use Illuminate\Database\Eloquent\Model;
use Core\Traits\EncryptionTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Wjcrypto\Customer\Model\Customer;

/**
 * Class CustomerAddress
 * @package Wjcrypto\CustomerAddress\Model
 */
class CustomerAddress extends Model
{
    use EncryptionTrait;

    /**
     * @var string
     */
    protected $table = 'customer_address';

    /**
     * @var string
     */
    protected $primaryKey = 'customer_address_id';

    /**
     * @var string[]
     */
    protected $encryptable = [
        'street','number','neighborhood','city','country','zipcode'
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'street','number','neighborhood','city','country','zipcode','customer_id'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [

    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}
