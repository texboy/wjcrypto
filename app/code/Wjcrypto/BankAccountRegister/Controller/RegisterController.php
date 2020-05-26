<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Controller;

use Core\Model\TransactionLogger;
use Pecee\Http\Input\InputHandler;
use Psr\Log\LogLevel;
use Throwable;
use Wjcrypto\BankAccount\Model\BankAccountLogger;
use Wjcrypto\BankAccountRegister\Model\Services\RegisterProcessor;
use Core\Validation\ValidationException;

/**
 * Class RegisterController
 * @package Wjcrypto\BankAccountRegister\Controller
 */
class RegisterController
{

    /**
     * @var RegisterProcessor
     */
    private $registerProcessor;

    /**
     * @var InputHandler
     */
    private $inputHandler;

    /**
     * @var TransactionLogger
     */
    private $transactionLogger;

    /**
     * RegisterController constructor.
     * @param RegisterProcessor $registerProcessor
     * @param InputHandler $inputHandler
     * @param TransactionLogger $transactionLogger
     */
    public function __construct(
        RegisterProcessor $registerProcessor,
        InputHandler $inputHandler,
        TransactionLogger $transactionLogger
    ) {
        $this->registerProcessor = $registerProcessor;
        $this->inputHandler = $inputHandler;
        $this->transactionLogger = $transactionLogger;
    }


    /**
     * @return string|null
     * @throws ValidationException
     * @throws Throwable
     */
    public function registerAccount(): ?string
    {
        $requestData = $this->inputHandler->all();
        $response = $this->registerProcessor->process($requestData);
        unset($requestData['user']['password']);
        $logMessage = 'Account creation request info: ' . json_encode($requestData);
        $this->transactionLogger->log(LogLevel::INFO, $logMessage);
        return response()->httpCode(200)->json([
            $response
        ]);
    }
}
