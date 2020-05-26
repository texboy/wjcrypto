<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('customer', function ($table) {
    $table->id('customer_id');
    $table->text('name');
    $table->text('telephone');
    $table->text('dof');
    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')->references('user_id')->on('user');
    $table->unsignedBigInteger('customer_type_id');
    $table->foreign('customer_type_id')->references('customer_type_id')->on('customer_type');
    $table->timestamps();
});

