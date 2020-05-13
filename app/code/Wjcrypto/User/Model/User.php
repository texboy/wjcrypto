<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\User\Model;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;

class User extends Model

{
    Use Encryptable;

    protected $table = 'user';
    protected $primaryKey = 'user_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password'
    ];


    public function customer()
    {
        return $this->hasOne('customer');
    }

}