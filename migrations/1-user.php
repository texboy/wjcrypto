<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('user', function ($table) {
    $table->id('user_id');
    $table->text('username');
    $table->text('password');
    $table->timestamps();
});

Manager::table('user')->insert(
    array(
        'username' => \Core\Model\Encryption::getEncrypter()->encrypt('admin'),
        'password' => \Core\Model\Encryption::getEncrypter()->encrypt('admin')
    )
);