<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccount\Model\Services;

use Throwable;

/**
 * Interface RegisterSaveInterface
 * @package Wjcrypto\BankAccount\Model\Services
 */
interface RegisterSaveInterface
{
    /**
     * @param array $accountData
     * @throws Throwable
     * @return string
     */
    public function save(array $accountData): string;
}