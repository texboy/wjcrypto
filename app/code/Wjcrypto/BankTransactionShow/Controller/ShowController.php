<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionShow\Controller;


use Exception;
use Wjcrypto\Transaction\Model\TransactionRepository;

/**
 * Class RegisterController
 * @package Wjcrypto\BankAccountRegister\Controller
 */
class ShowController
{
    public const BANK_TRANSACTION_RELATIONSHIPS = [
        'sender',
        'receiver',
    ];

    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    /**
     * ShowController constructor.
     * @param TransactionRepository $transactionRepository
     */
    public function __construct(
        TransactionRepository $transactionRepository
    ) {
        $this->transactionRepository = $transactionRepository;
    }


    /**
     * @param $id
     * @return string|null
     * @throws Exception
     */
    public function getTransaction($id): ?string
    {
        return response()->httpCode(200)->json([
            $this->transactionRepository->getById($id, self::BANK_TRANSACTION_RELATIONSHIPS)
        ]);
    }

    /**
     * @return string|null
     * @throws Exception
     */
    public function getTransactions(): ?string
    {
        return response()->httpCode(200)->json([
            $this->transactionRepository->getAll(self::BANK_TRANSACTION_RELATIONSHIPS)
        ]);
    }
}
