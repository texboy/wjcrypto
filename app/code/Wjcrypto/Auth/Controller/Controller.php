<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Auth\Controller;

use Pecee\Http\Request;
use Wjcrypto\BankAccountShow\Controller\ShowController;
use Wjcrypto\User\Model\UserRepository;

/**
 * Class Controller
 * @package Wjcrypto\Auth\Controller
 */
class Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Request
     */
    private $request;

    /**
     * Controller constructor.
     * @param UserRepository $userRepository
     * @param Request $request
     */
    public function __construct(
        UserRepository $userRepository,
        Request $request
    ) {
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    /**
     * @return string|null
     */
    public function getUserByAuth(): ?string
    {
        return response()->httpCode(200)->json([
            $this->userRepository->getByUsername(
                $this->request->getUser(),
                ShowController::BANK_USER_ACCOUNT_RELATIONSHIPS
            )->toArray()
        ]);
    }

}