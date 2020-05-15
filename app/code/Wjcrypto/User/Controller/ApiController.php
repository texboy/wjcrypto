<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */


namespace Wjcrypto\User\Controller;

use Pecee\Controllers\IResourceController;
use Wjcrypto\User\Model\User;


class ApiController implements IResourceController{

    /**
     * @var User
     */
    private $user;

    /**
     * ApiController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * @return string|null
     */
    public function index(): ?string
    {
        $user = User::all()->toArray();
        return response()->json([
            $user
        ]);
    }

    public function show($id): ?string
    {
        $user = User::find($id)->toArray();
        return response()->json([
            $user
        ]);
    }

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

    public function create(): ?string
    {
        // TODO: Implement create() method.
    }

    public function edit($id): ?string
    {
       //TODO
    }

    public function update($id): ?string
    {
        // TODO: Implement update() method.
    }

    public function destroy($id): ?string
    {
        // TODO: Implement destroy() method.
    }
}
