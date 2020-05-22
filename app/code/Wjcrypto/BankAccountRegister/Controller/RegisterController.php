<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Controller;

use Pecee\Http\Input\InputHandler;
use Pecee\Http\Request;
use Wjcrypto\BankAccountRegister\Model\Services\RegisterProcessorInterface;
use Wjcrypto\Core\Model\ValidationException;
use Wjcrypto\Customer\Model\CustomerRepositoryInterface;
use Wjcrypto\User\Model\UserRepositoryInterface;

class RegisterController
{

    /**
     * @var RegisterProcessorInterface
     */
    private $registerProcessor;

    /**
     * @var InputHandler
     */
    private $inputHandler;

    /**
     * RegisterController constructor.
     * @param RegisterProcessorInterface $registerProcessor
     * @param InputHandler $inputHandler
     */
    public function __construct(
        RegisterProcessorInterface $registerProcessor,
        InputHandler $inputHandler
    ) {
        $this->registerProcessor = $registerProcessor;
        $this->inputHandler = $inputHandler;
    }


    /**
     * @return string|null
     * @throws ValidationException
     */
    public function registerAccount(): ?string
    {
        $requestData = $this->inputHandler->all();
        return response()->json([
            $this->registerProcessor->process($requestData)
        ]);
    }
}
