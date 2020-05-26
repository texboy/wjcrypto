<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Auth\Middleware;

use Exception;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Psr\Log\LogLevel;
use Wjcrypto\Auth\Model\LoginLogger;
use Wjcrypto\User\Model\UserRepository;

/**
 * Class ApiVerification
 * @package Wjcrypto\Router\Middleware
 */
class ApiAuth implements IMiddleware
{
    private const IGNORED_ROUTES = [
        '/api/document/types/',
        '/api/transaction/types/',
        '/api/customer/types/',
        '/api/bank/account/register/'
    ];

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var LoginLogger
     */
    private $loginLogger;

    /**
     * ApiAuth constructor.
     * @param UserRepository $userRepository
     * @param LoginLogger $loginLogger
     */
    public function __construct(
        UserRepository $userRepository,
        LoginLogger $loginLogger
    ) {
        $this->userRepository = $userRepository;
        $this->loginLogger = $loginLogger;
    }


    /**
     * @param Request $request
     * @throws Exception
     */
    public function handle(Request $request): void
    {
        if (!in_array($request->getUrl()->getPath(), self::IGNORED_ROUTES)) {
            $authorized = false;
            $headerAuth = $request->getHeader('http_authorization');
            if (preg_match('/^basic/i', $headerAuth)) {
                list($username, $password) = explode(':', base64_decode(substr($headerAuth, 6)));
            }

            if (empty($username) || empty($password)) {
                $message = 'User not authenticated.';
                $this->loginLogger->log(LogLevel::INFO, $message);
                throw new Exception($message, 401);
            }

            if ($this->userRepository->usernameExists($username)) {
                $user = $this->userRepository->getByUsername($username, []);
                if ($user->password == $password) {
                    $message = 'The user: "' . $username . '" logged in successfully';
                    $this->loginLogger->log(LogLevel::INFO, $message);
                    $request->loggedUser = $username;
                    $authorized = true;
                }
            }

            if (!$authorized) {
                $message = 'Username or password is incorrect.';
                $this->loginLogger->log(LogLevel::INFO, $message);
                throw new Exception($message, 401);
            }
        }
    }
}
