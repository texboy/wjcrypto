<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */


namespace Wjcrypto\User\Controller;

use Pecee\Controllers\IResourceController;


class ApiController implements IResourceController{

    /**
     * @return string|null
     */
    public function index(): ?string
    {
        $inputHandler = input();
        return response()->json([
            'method' => 'index'
        ]);
    }

    public function show($id): ?string
    {
        // TODO: Implement show() method.
    }

    public function store(): ?string
    {
        $inputHandler = input();
        $data = $inputHandler->all();
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
        $inputHandler = input();
        $data = $inputHandler->all();
        return response()->json([
            'method' => 'index'
        ]);
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
