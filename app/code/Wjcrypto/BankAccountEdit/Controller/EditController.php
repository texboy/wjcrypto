<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Controller;

use Core\Model\TransactionLogger;
use Core\Validation\ValidationException;
use Exception;
use Pecee\Http\Input\InputHandler;
use Psr\Log\LogLevel;
use Throwable;
use Wjcrypto\BankAccountEdit\Model\Services\EditProcessor;

/**
 * Class RegisterController
 * @package Wjcrypto\BankAccountRegister\Controller
 */
class EditController
{
    /** @var EditProcessor */
    private $editProcessor;

    /**
     * @var InputHandler
     */
    private $inputHandler;

    /**
     * @var TransactionLogger
     */
    private $transactionLogger;

    /**
     * EditController constructor.
     * @param EditProcessor $editProcessor
     * @param InputHandler $inputHandler
     * @param TransactionLogger $transactionLogger
     */
    public function __construct(
        EditProcessor $editProcessor,
        InputHandler $inputHandler,
        TransactionLogger $transactionLogger
    ) {
        $this->editProcessor = $editProcessor;
        $this->inputHandler = $inputHandler;
        $this->transactionLogger = $transactionLogger;
    }


    /**
     * @return string|null
     * @throws ValidationException|Throwable
     */
    public function editAccount(): ?string
    {
        $requestData = $this->inputHandler->all();
        $response = $this->editProcessor->process($requestData);
        $logMessage = 'Account edit request info: ' . json_encode($requestData);
        $this->transactionLogger->log(LogLevel::INFO, $logMessage);
        return response()->httpCode(200)->json(
            [$response]
        );
    }
}
