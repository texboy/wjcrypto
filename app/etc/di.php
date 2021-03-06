<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

return [
    //Encryption
    \Illuminate\Encryption\Encrypter::class =>
        \DI\autowire()
            ->constructor(getenv('APP_KEY'), 'AES-256-CBC'),

    //_________Logger_____________
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

    'AccessStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/access.log', Monolog\Logger::INFO),

    \Core\Model\AccessLogger::class =>
        \DI\autowire()
            ->constructor('core')
            ->method('pushHandler', DI\get('AccessStreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class)),

    'TransactionStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/transaction.log', Monolog\Logger::INFO),

    \Core\Model\TransactionLogger::class =>
        \DI\autowire()
            ->constructor('core')
            ->method('pushHandler', DI\get('TransactionStreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class)),

    'LoginStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/login.log', Monolog\Logger::INFO),

    \Wjcrypto\Auth\Model\LoginLogger::class =>
        \DI\autowire()
            ->constructor('login')
            ->method('pushHandler', DI\get('LoginStreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class)),

    /*____________BankAccount________________*/
    'BankAccountStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/bank-account.log', Monolog\Logger::INFO),

    \Wjcrypto\BankAccountEdit\Model\BankAccountLogger::class =>
        \DI\autowire()
            ->constructor('error')
            ->method('pushHandler', DI\get('BankAccountStreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class)),

    'register.validators' => [
        DI\get(\Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\UserValidator::class),
        DI\get(\Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\CustomerValidator::class),
        DI\get(\Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\DocumentValidator::class),
        DI\get(\Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\AddressValidator::class)
        ],


    \Wjcrypto\BankAccountRegister\Model\Services\RegisterValidator::class =>
        \DI\autowire()
            ->constructorParameter('registerValidators', DI\get('register.validators')),

    'edit.validators' => [
        DI\get(\Wjcrypto\BankAccountEdit\Model\Services\EditValidators\UserValidator::class),
        DI\get(\Wjcrypto\BankAccountEdit\Model\Services\EditValidators\CustomerValidator::class),
        DI\get(\Wjcrypto\BankAccountEdit\Model\Services\EditValidators\DocumentValidator::class),
        DI\get(\Wjcrypto\BankAccountEdit\Model\Services\EditValidators\AddressValidator::class)
    ],

    \Wjcrypto\BankAccountEdit\Model\Services\EditValidator::class =>
        \DI\autowire()
            ->constructorParameter('editValidators', DI\get('edit.validators')),

    /*________BankTransaction_________*/
    'transaction.validators' => [
        DI\get(\Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators\TransactionValidator::class),
        DI\get(\Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators\TransactionTypeValidator::class),
        DI\get(\Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators\AccountValidator::class),
        DI\get(\Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidators\AccountBalanceValidator::class)
    ],

    \Wjcrypto\BankTransactionCreate\Model\Services\TransactionValidator::class =>
        \DI\autowire()
            ->constructorParameter('transactionValidators', DI\get('transaction.validators')),
];
