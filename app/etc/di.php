<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\CustomerValidator;
use Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\DocumentValidator;
use Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\UserValidator;

return [
    //Encryption
    \Illuminate\Encryption\Encrypter::class =>
        \DI\autowire()
            ->constructor(getenv('APP_KEY'), 'AES-256-CBC'),

    //Loggers
    'CoreStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/core.log', Monolog\Logger::INFO),

    \Core\Model\CoreLogger::class =>
        \DI\autowire()
            ->constructor('core')
            ->method('pushHandler', DI\get('CoreStreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class)),

    'ErrorStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/error.log', Monolog\Logger::INFO),

     \Core\Model\ErrorLogger::class =>
        \DI\autowire()
            ->constructor('error')
            ->method('pushHandler', DI\get('ErrorStreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class)),

    /*____________BankAccount________________*/
    \Wjcrypto\BankAccountRegister\Model\Services\RegisterProcessorInterface::class =>
        \DI\autowire(\Wjcrypto\BankAccountRegister\Model\Services\RegisterProcessor::class),

    \Wjcrypto\BankAccountRegister\Model\Services\RegisterSaveInterface::class =>
        \DI\autowire(\Wjcrypto\BankAccountRegister\Model\Services\RegisterSave::class),

    'register.validators' => [
        DI\get(UserValidator::class),
        DI\get(CustomerValidator::class),
        DI\get(DocumentValidator::class)
        ],

    \Wjcrypto\BankAccountRegister\Model\Services\RegisterValidatorInterface::class =>
        \DI\autowire(\Wjcrypto\BankAccountRegister\Model\Services\RegisterValidator::class)
            ->constructorParameter('registerValidators', DI\get('register.validators')),

    ];
