<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\BankAccountRegister\Model\Services;

/**
 * Interface RegisterSaveInterface
 * @package Wjcrypto\BankAccountRegister\Model\Services
 */
interface RegisterSaveInterface
{
    /**
     * @param array $accountData
     * @return string
     */
    public function save(array $accountData): string;
}