<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Controller;

use Pecee\Controllers\IResourceController;
use Wjcrypto\User\Model\User;

/**
 * Class ApiController
 * @package Wjcrypto\User\Controller
 */
class ApiController implements IResourceController{

    /**
     * @var User
     */
    private $user;

    /**
     * @inheritDoc
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * @inheritDoc
     */
    public function index(): ?string
    {
        $user = User::all()->toArray();
        return response()->json([
           "users" => $user
        ]);
    }

    /**
     * @inheritDoc
     */
    public function show($id): ?string
    {
        $user = User::find($id)->toArray();
        return response()->json([
            $user
        ]);
    }

    /**
     * @inheritDoc
     */
    public function store(): ?string
    {
        $inputHandler = input();
        $data = $inputHandler->all();
        $this->user->username = $data['username'];
        $this->user->password = $data['password'];
        $this->user->save();

        return response()->json([
            'method' => 'index'
        ]);
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
       //TODO
    }

    /**
     * @inheritDoc
     */
    public function update($id): ?string
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function destroy($id): ?string
    {
        // TODO: Implement destroy() method.
    }
}
