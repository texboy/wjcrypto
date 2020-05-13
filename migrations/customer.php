<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('customer', function ($table) {
    $table->id('customer_id');
    $table->text('type')->comment('0 for individual, 1 fo legal entity');
    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')->references('user_id')->on('user');
    $table->timestamps();
});