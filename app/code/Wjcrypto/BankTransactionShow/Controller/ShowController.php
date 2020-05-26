<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionShow\Controller;


use Core\Model\AccessLogger;
use Exception;
use Psr\Log\LogLevel;
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
     * @var AccessLogger
     */
    private $accessLogger;

    /**
     * ShowController constructor.
     * @param TransactionRepository $transactionRepository
     * @param AccessLogger $accessLogger
     */
    public function __construct(
        TransactionRepository $transactionRepository,
        AccessLogger $accessLogger
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->accessLogger = $accessLogger;
    }


    /**
     * @param $id
     * @return string|null
     * @throws Exception
     */
    public function getTransaction($id): ?string
    {
        $reponse = $this->transactionRepository->getById($id, self::BANK_TRANSACTION_RELATIONSHIPS);
        $this->accessLogger->log(LogLevel::INFO, '');
        return response()->httpCode(200)->json([
            $reponse
        ]);
    }

    /**
     * @return string|null
     * @throws Exception
     */
    public function getTransactions(): ?string
    {
        $reponse = $this->transactionRepository->getAll(self::BANK_TRANSACTION_RELATIONSHIPS);
        $this->accessLogger->log(LogLevel::INFO, '');
        return response()->httpCode(200)->json([
            $reponse
        ]);
    }
}
