<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Model\Services;

use Exception;
use Throwable;
use Wjcrypto\Account\Model\AccountRepository;
use Wjcrypto\Transaction\Model\TransactionRepository;
use Wjcrypto\Transaction\Model\TransactionType;
use Wjcrypto\Transaction\Model\TransactionTypeRepository;

/**
 * Class TransactionSave
 * @package Wjcrypto\BankTransactionCreate\Model\Services
 */
class TransactionSave
{
    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    /**
     * @var TransactionTypeRepository
     */
    private $transactionTypeRepository;

    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * TransactionSave constructor.
     * @param TransactionRepository $transactionRepository
     * @param TransactionTypeRepository $transactionTypeRepository
     * @param AccountRepository $accountRepository
     */
    public function __construct(
        TransactionRepository $transactionRepository,
        TransactionTypeRepository $transactionTypeRepository,
        AccountRepository $accountRepository
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->transactionTypeRepository = $transactionTypeRepository;
        $this->accountRepository = $accountRepository;
    }


    /**
     * @param array $requestData
     * @return string
     * @throws Throwable
     */
    public function save(array $requestData): string
    {
        $databaseConnection = $this->transactionRepository->getDatabaseConnection();
        return $databaseConnection->transaction(function () use ($requestData) {
            $this->transactionRepository->save($requestData['transaction']);
            $this->saveAccountBalance($requestData);
            return 'Success';
        });
    }

    /**
     * @param array $requestData
     * @throws Exception
     */
    private function saveAccountBalance(array $requestData): void
    {
        $sender = $this->accountRepository->getById($requestData['transaction']['sender_account_id']);
        $receiver = $this->accountRepository->getById($requestData['transaction']['receiver_account_id']);
        $transactionAmount = $requestData['transaction']['amount'];

        $transactionTypeValue = $this->transactionTypeRepository
            ->getById($requestData['transaction']['transaction_type_id'])->value;

        $finalBalance = [];
        if ($transactionTypeValue == TransactionType::TRANSACTION_TYPE_DEPOSIT) {
            $finalBalance = $this->deposit($sender->balance, $transactionAmount);
            $sender->balance = $finalBalance['senderBalance'];
        } elseif ($transactionTypeValue == TransactionType::TRANSACTION_TYPE_WITHDRAW) {
            $finalBalance = $this->withdraw($sender->balance, $transactionAmount);
            $sender->balance = $finalBalance['senderBalance'];
        } elseif ($transactionTypeValue == TransactionType::TRANSACTION_TYPE_TRANSFER) {
            $finalBalance = $this->transfer($sender->balance, $receiver->balance, $transactionAmount);
            $sender->balance = $finalBalance['senderBalance'];
            $receiver->balance = $finalBalance['receiverBalance'];
        }

        $this->accountRepository->update($sender);
        $this->accountRepository->update($receiver);
    }

    /**
     * @param $senderBalance
     * @param $receiverBalance
     * @param $amount
     * @return array
     */
    private function deposit($senderBalance, $amount): array
    {
        $transaction['senderBalance'] = (string) round((float) $senderBalance + (float) $amount, 2);
        return $transaction;
    }

    /**
     * @param $senderBalance
     * @param $receiverBalance
     * @param $amount
     * @return array
     */
    private function withdraw($senderBalance, $amount): array
    {
        $transaction['senderBalance'] = (string) round((float) $senderBalance - (float) $amount, 2);
        return $transaction;
    }

    /**
     * @param $senderBalance
     * @param $receiverBalance
     * @param $amount
     * @return array
     */
    private function transfer($senderBalance, $receiverBalance, $amount): array
    {
        $transaction['senderBalance'] = (string) round((float) $senderBalance - (float) $amount, 2);
        $transaction['receiverBalance'] = (string) round((float) $receiverBalance + (float) $amount, 2);
        return $transaction;
    }
}
