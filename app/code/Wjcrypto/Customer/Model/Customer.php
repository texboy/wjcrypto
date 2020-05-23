<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Core\Traits\EncryptionTrait;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Wjcrypto\Account\Model\Account;
use Wjcrypto\Document\Model\Document;
use Wjcrypto\User\Model\User;

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
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function customerType(): BelongsTo
    {
        return $this->belongsTo(CustomerType::class, 'customer_type_id', 'customer_type_id');
    }

    /**
     * @return HasMany
     */
    public function document(): HasMany
    {
        return $this->hasMany(Document::class, 'customer_id', 'customer_id');
    }

    /**
     * @return HasOne
     */
    public function account(): HasOne
    {
        return $this->hasOne(Account::class, 'customer_id', 'customer_id');
    }
}
