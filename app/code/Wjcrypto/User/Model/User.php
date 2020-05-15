<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Model;

use Illuminate\Database\Eloquent\Model;
use Wjcrypto\Encryption\Traits\EncryptionTrait;

class User extends Model

{
    Use EncryptionTrait;

    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $encryptable = [
        'username', 'password'
    ];

    protected $fillable = [
        'username', 'password'
    ];

    protected $hidden = [
        'password'
    ];


    public function customer()
    {
        return $this->hasOne('customer');
    }

}