<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Model;

use Illuminate\Encryption\Encrypter;

/**
 * Class Encryption
 * @package Core\Model
 */
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
    public static function getEncrypter(): Encrypter
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