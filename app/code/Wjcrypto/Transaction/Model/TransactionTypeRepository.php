<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Transaction\Model;

use Core\Model\BaseRepository;

/**
 * Class TransactionTypeRepository
 * @package Wjcrypto\Transaction\Model
 */
class TransactionTypeRepository extends BaseRepository
{
    /**
     * AccountRepository constructor.
     * @param TransactionType $transactionType
     */
    public function __construct(TransactionType $transactionType)
    {
        $this->entity = $transactionType;
    }
}
