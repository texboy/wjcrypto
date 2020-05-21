<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Wjcrypto\Encryption\Traits\EncryptionTrait;

/**
 * Class Customer
 * @package Wjcrypto\Customer\Model
 */
class Customer extends Model
{
    use EncryptionTrait;

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
        'name'
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'user_id','customer_type_id'
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
        return $this->belongsTo('Wjcrypto\User\Model\User', 'user_id', 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function customerType(): BelongsTo
    {
        return $this->belongsTo('Wjcrypto\Customer\Model\CustomerType', 'customer_type_id', 'customer_type_id');
    }

    /**
     * @return HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany('Wjcrypto\Document\Model\Document', 'customer_id', 'customer_id');
    }
}
