<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Transaction\Model;

use Illuminate\Database\Eloquent\Model;
use Core\Traits\EncryptionTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class TransactionType
 * @package Wjcrypto\Transaction\Model
 */
class TransactionType extends Model
{
    public const TRANSACTION_TYPE_DEPOSIT = 'deposit';
    public const TRANSACTION_TYPE_WITHDRAW = 'withdraw';
    public const TRANSACTION_TYPE_TRANSFER = 'transfer';

    use EncryptionTrait;

    /**
     * @var string
     */
    protected $table = 'transaction_type';

    /**
     * @var string
     */
    protected $primaryKey = 'transaction_type_id';

    /**
     * @var string[]
     */
    protected $encryptable = [
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'value'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
    ];

    /**
     * @return HasMany
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'transaction_type_id', 'transaction_type_id');
    }
}
