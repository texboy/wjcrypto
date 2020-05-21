<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

return [
    Illuminate\Encryption\Encrypter::class =>
        \DI\autowire()
            ->constructor(getenv('APP_KEY'), 'AES-256-CBC'),

    Wjcrypto\User\Model\UserRepositoryInterface::class =>
        \Di\autowire(\Wjcrypto\User\Model\UserRepository::class),

    //Core Logger
    'CoreStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/core.log', Monolog\Logger::INFO),
    'Wjcrypto\Router\Model\CoreLogger' =>
        \DI\autowire()
            ->constructor('general')
            ->method('pushHandler', DI\get('CoreStreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class)),

    //User Logger
    'UserStreamHandler' =>
        \DI\autowire(Monolog\Handler\StreamHandler::class)
            ->constructor(__DIR__ . '/../../var/log/user.log', Monolog\Logger::INFO),
    'Wjcrypto\User\Model\UserLogger' =>
        \DI\autowire()
            ->constructor('general')
            ->method('pushHandler', DI\get('StreamHandler'))
            ->method('pushProcessor', DI\create(\Monolog\Processor\WebProcessor::class))
];
