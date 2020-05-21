<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Router\Controller;


interface CustomApiControllerInterface
{
    /**
     * @return string|null
     */
    public function postCreate(): ?string;

    /**
     * @return string|null
     */
    public function getList(): ?string;

    /**
     * @return string|null
     */
    public function postEdit(): ?string;

    /**
     * @return string|null
     */
    public function posEdit(): ?string;


}