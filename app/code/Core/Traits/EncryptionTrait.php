<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Traits;

use Core\Model\Encryption;

/**
 * Trait EncryptionTrait
 * @package Core\Traits
 */
trait EncryptionTrait
{
    /**
     * @param  $key
     * @return mixed $value
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        if (in_array($key, $this->encryptable) && $value !== '') {
            $value = Encryption::getEncrypter()->decrypt($value);
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
            $value = Encryption::getEncrypter()->encrypt($value);
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
                $attributes[$key] =  Encryption::getEncrypter()->decrypt($attributes[$key]);
            }
        }
        return $attributes;
    }
}