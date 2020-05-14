<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Database\Traits;

use Illuminate\Encryption\Encrypter;

trait EncryptionTrait
{

    /**
     * @var Encrypter
     */
    private $encrypter;

    /**
     * Encryptable constructor.
     * @param Encrypter $encrypter
     */
    public function __construct(Encrypter $encrypter)
    {
        $this->encrypter = $encrypter;
    }

    /**
     * @param  $key
     * @return mixed $value
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        if (in_array($key, $this->encryptable) && $value !== '') {
            $value = $this->encrypter->decrypt($value);
        }
        return $value;
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = $this->encrypter->encrypt($value);
        }
        return parent::setAttribute($key, $value);
    }

    /**
     * @return array
     */
    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();
        foreach ($this->encryptable as $key) {
            if (isset($attributes[$key])) {
                $attributes[$key] = $this->encrypter->decrypt($attributes[$key]);
            }
        }
        return $attributes;
    }
}