<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Psr\Container\ContainerInterface;
use Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\CustomerValidator;
use Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\DocumentValidator;
use Wjcrypto\BankAccountRegister\Model\Services\RegisterValidators\UserValidator;

return [
    //Encryption
    \Illuminate\Encryption\Encrypter::class =>
        \DI\autowire()
            ->constructor(getenv('APP_KEY'), 'AES-256-CBC'),

    //Repositories
    \Wjcrypto\User\Model\UserRepositoryInterface::class =>
        \DI\autowire(\Wjcrypto\User\Model\UserRepository::class),

    \Wjcrypto\Customer\Model\CustomerRepositoryInterface::class =>
        \DI\autowire(\Wjcrypto\Customer\Model\CustomerRepository::class),

    \Wjcrypto\Customer\Model\CustomerTypeRepositoryInterface::class =>
        \DI\autowire(\Wjcrypto\Customer\Model\CustomerTypeRepository::class),

    \Wjcrypto\Document\Model\DocumentRepositoryInterface::class =>
        \DI\autowire(\Wjcrypto\Document\Model\DocumentRepository::class),

    \Wjcrypto\Document\Model\DocumentTypeRepositoryInterface::class =>
        \DI\autowire(\Wjcrypto\Document\Model\DocumentTypeRepository::class),

    \Wjcrypto\Account\Model\AccountRepositoryInterface::class =>
        \DI\autowire(\Wjcrypto\Account\Model\AccountRepository::class),

    //Loggers
    'CoreStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/core.log', Monolog\Logger::INFO),
    'Wjcrypto\Router\Model\CoreLogger' =>
        \DI\autowire()
            ->constructor('general')
            ->method('pushHandler', DI\get('CoreStreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class)),

    'UserStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/user.log', Monolog\Logger::INFO),

    'Wjcrypto\User\Model\UserLogger' =>
        \DI\autowire()
            ->constructor('general')
            ->method('pushHandler', DI\get('StreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class)),

    /*____________BankAccount________________*/
    \Wjcrypto\BankAccount\Model\Services\RegisterProcessorInterface::class =>
        \DI\autowire(\Wjcrypto\BankAccount\Model\Services\RegisterProcessor::class),

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
