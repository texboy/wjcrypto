<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Controller;

use Core\Model\TransactionLogger;
use Pecee\Http\Input\InputHandler;
use Psr\Log\LogLevel;
use Throwable;
use Wjcrypto\BankAccount\Model\BankAccountLogger;
use Wjcrypto\BankAccountRegister\Model\Services\RegisterProcessor;
use Core\Validation\ValidationException;
use Wjcrypto\BankTransactionCreate\Model\Services\TransactionProcessor;
use Wjcrypto\Transaction\Model\Transaction;

/**
 * Class RegisterController
 * @package Wjcrypto\BankAccountRegister\Controller
 */
class CreateController
{
    /**
     * @var InputHandler
     */
    private $inputHandler;

    /**
     * @var TransactionProcessor
     */
    private $transactionProcessor;

    /**
     * @var TransactionLogger
     */
    private $transactionLogger;

    /**
     * CreateController constructor.
     * @param InputHandler $inputHandler
     * @param TransactionProcessor $transactionProcessor
     * @param TransactionLogger $transactionLogger
     */
    public function __construct(
        InputHandler $inputHandler,
        TransactionProcessor $transactionProcessor,
        TransactionLogger $transactionLogger
    ) {
        $this->inputHandler = $inputHandler;
        $this->transactionProcessor = $transactionProcessor;
        $this->transactionLogger = $transactionLogger;
    }


    /**
     * @return string|null
     * @throws ValidationException
     */
    public function createTransaction(): ?string
    {
        $requestData = $this->inputHandler->all();
        $response = $this->transactionProcessor->process($requestData);
        $logMessage = 'Transaction creation request info: ' . json_encode($requestData);
        $this->transactionLogger->log(LogLevel::INFO, $logMessage);
        return response()->httpCode(200)->json([
            $response
        ]);
    }
}
