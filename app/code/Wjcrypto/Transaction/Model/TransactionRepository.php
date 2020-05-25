<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Transaction\Model;

use Core\Model\BaseRepository;

/**
 * Class TransactionRepository
 * @package Wjcrypto\Transaction\Model
 */
class TransactionRepository extends BaseRepository
{
    /**
     * AccountRepository constructor.
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction)
    {
        $this->entity = $transaction;
    }
}