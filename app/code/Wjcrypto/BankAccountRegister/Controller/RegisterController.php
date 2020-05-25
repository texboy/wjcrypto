<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Controller;

use Pecee\Http\Input\InputHandler;
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
     * @var BankAccountLogger
     */

    /**
     * RegisterController constructor.
     * @param RegisterProcessor $registerProcessor
     * @param InputHandler $inputHandler
     */
    public function __construct(
        RegisterProcessor $registerProcessor,
        InputHandler $inputHandler
    ) {
        $this->registerProcessor = $registerProcessor;
        $this->inputHandler = $inputHandler;
    }

    /**
     * @return string|null
     * @throws ValidationException
     * @throws Throwable
     */
    public function registerAccount(): ?string
    {
        return response()->httpCode(200)->json([
            $this->registerProcessor->process($this->inputHandler->all())
        ]);
    }
}
