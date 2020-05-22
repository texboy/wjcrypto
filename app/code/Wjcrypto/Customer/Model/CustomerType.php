<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Core\Traits\EncryptionTrait;

/**
 * Class CustomerType
 * @package Wjcrypto\Customer\Model
 */
class CustomerType extends Model
{
    use EncryptionTrait;

    /**
     * @var string
     */
    protected $table = 'customer_type';

    /**
     * @var string
     */
    protected $primaryKey = 'customer_type_id';

    /**
     * @var string[]
     */
    protected $encryptable = [
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [

    ];

    /**
     * @return BelongsTo
     */
    public function customer(): HasMany
    {
        return $this->hasMany('Wjcrypto\Cusotmer\Model\Customer', 'customer_type_id');
    }
}
