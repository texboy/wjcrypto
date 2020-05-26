<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankTransactionCreate\Controller;

use Pecee\Http\Input\InputHandler;
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
     * CreateController constructor.
     * @param InputHandler $inputHandler
     * @param TransactionProcessor $transactionProcessor
     */
    public function __construct(InputHandler $inputHandler, TransactionProcessor $transactionProcessor)
    {
        $this->inputHandler = $inputHandler;
        $this->transactionProcessor = $transactionProcessor;
    }

    /**
     * @return string|null
     * @throws ValidationException
     */
    public function createTransaction(): ?string
    {
        return response()->httpCode(200)->json([
            $this->transactionProcessor->process($this->inputHandler->all()),
        ]);
    }
}
