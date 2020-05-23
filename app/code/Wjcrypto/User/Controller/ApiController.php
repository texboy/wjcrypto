<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Controller;

use Pecee\Controllers\IResourceController;
use Wjcrypto\User\Model\User;
use Wjcrypto\User\Model\UserRepository;
use Wjcrypto\User\Model\UserRepositoryInterface;

/**
 * Class ApiController
 * @package Wjcrypto\User\Controller
 */
class ApiController implements IResourceController {

    /**
     * @var User
     */
    private $user;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * ApiController constructor.
     * @param User $user
     * @param UserRepository $userRepository
     */
    public function __construct(
        User $user,
        UserRepository $userRepository
    ) {
        $this->user = $user;
        $this->userRepository = $userRepository;
    }


    /**
     * @inheritDoc
     */
    public function index(): ?string
    {
        return response()->json([
           "users" => $this->userRepository->getAllUsers()->toArray()
        ]);
    }

    /**
     * @inheritDoc
     */
    public function show($id): ?string
    {
        $user = $this->userRepository->getById($id);
        return response()->json([
            $user->toArray()
        ]);
    }

    /**
     * @inheritDoc
     */
    public function store(): ?string
    {
        $test = input()->all();
        $user = input()->all()['user'];
        $result = $this->userRepository->saveUser( $user );
        return response()->json([
            $result
        ]);
//
//        return response()->json([
//            'user_id' =>  $this->userRepository->saveUser(input()->all()['user'])
//        ]);
    }

    /**
     * @inheritDoc
     */
    public function create(): ?string
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function edit($id): ?string
    {

    }

    /**
     * @inheritDoc
     */
    public function update($id): ?string
    {
        $test = input()->all();
        $result = $this->userRepository->updateUser($id, input()->all()['user']);
        return response()->json([
            $result ? "Success" : "Fail"
        ]);
    }

    /**
     * @inheritDoc
     */
    public function destroy($id): ?string
    {
        // TODO: Implement destroy() method.
    }

    public function test(): ?string
    {
        return response()->json([
            'method' => 'test'
        ]);
    }
}
