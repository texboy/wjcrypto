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
        // TODO: Implement store() method.
    }

    public function create(): ?string
    {
        // TODO: Implement create() method.
    }

    public function edit($id): ?string
    {
        // TODO: Implement edit() method.
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
