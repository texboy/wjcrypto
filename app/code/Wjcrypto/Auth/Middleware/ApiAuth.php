<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Auth\Middleware;

use Exception;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Wjcrypto\User\Model\UserRepository;

/**
 * Class ApiVerification
 * @package Wjcrypto\Router\Middleware
 */
class ApiAuth implements IMiddleware
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * ApiAuth constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @throws Exception
     */
    public function handle(Request $request): void
    {
        $authorized = false;
        $headerAuth = $request->getHeader('http_authorization');
        if (preg_match('/^basic/i', $headerAuth)) {
            list($username, $password) = explode(':', base64_decode(substr($headerAuth, 6)));
        }

        if (empty($username) || empty($password)) {
            throw new Exception('User not authenticated.', 401);
        }

        if ($this->userRepository->usernameExists($username)) {
            $user = $this->userRepository->getByUsername($username, []);
            if ($user->password == $password) {
                $authorized = true;
            }
        }

        if (!$authorized) {
            throw new Exception('Username or password is incorrect.', 401);
        }
    }
}
