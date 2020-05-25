<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountEdit\Controller;

use Core\Validation\ValidationException;
use Exception;
use Pecee\Http\Input\InputHandler;
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
     * EditController constructor.
     * @param EditProcessor $editProcessor
     * @param InputHandler $inputHandler
     */
    public function __construct(EditProcessor $editProcessor, InputHandler $inputHandler)
    {
        $this->editProcessor = $editProcessor;
        $this->inputHandler = $inputHandler;
    }


    /**
     * @return string|null
     * @throws ValidationException
     */
    public function editAccount(): ?string
    {
        $this->editProcessor->process($this->inputHandler->all());
        return response()->httpCode(200)->json(
            ['Success!']
        );
    }
}
