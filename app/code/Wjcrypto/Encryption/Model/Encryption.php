<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Encryption\Model;

use Illuminate\Encryption\Encrypter;

class Encryption {

    /**
     * @var Encrypter
     */
    private static $instance;

    /**
     * @var Encrypter
     */
    private $encrypter;

    /**
     * Encryption constructor.
     * @param Encrypter $encrypter
     */
    public function __construct(
        Encrypter $encrypter
    ) {
        $this->encrypter = $encrypter;
    }

    /**
     * @return Encrypter
     */
    public static function getEncrypter(): \Illuminate\Encryption\Encrypter
    {
        return self::$instance;
    }

    /**
     * @return void
     */
    public function setEncrypterAsGlobal(): void
    {
        self::$instance = $this->encrypter;
    }
}