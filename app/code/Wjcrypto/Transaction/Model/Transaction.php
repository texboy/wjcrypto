<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Transaction\Model;

use Illuminate\Database\Eloquent\Model;
use Core\Traits\EncryptionTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Wjcrypto\Account\Model\Account;

/**
 * Class Transaction
 * @package Wjcrypto\Transaction\Model
 */
class Transaction extends Model
{
    use EncryptionTrait;

    /**
     * @var string
     */
    protected $table = 'transaction';

    /**
     * @var string
     */
    protected $primaryKey = 'transaction_id';

    /**
     * @var string[]
     */
    protected $encryptable = [
        'amount'
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'amount','sender_account_id','receiver_account_id','transaction_type_id'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
    ];

    /**
     * @return BelongsTo
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'sender_account_id', 'account_id');
    }

    /**
     * @return BelongsTo
     */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'receiver_account_id', 'account_id');
    }
}
