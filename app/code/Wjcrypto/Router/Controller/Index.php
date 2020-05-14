<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Router\Controller;

use Wjcrypto\User\Model\User;

class Index
{
    /**
     * @var User
     */
    private $user;

    /**
     * Index constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function notFound(): string
    {
        $this->user->username = 'teste';
        $this->user->password = 'teste';
        $this->user->save();
        return 'Page not found';
    }
}