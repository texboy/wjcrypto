<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('customer_address', function ($table) {
    $table->id('customer_address_id');
    $table->text('street');
    $table->text('number');
    $table->text('neighborhood');
    $table->text('city');
    $table->text('country');
    $table->text('zipcode');
    $table->unsignedBigInteger('customer_id');
    $table->foreign('customer_id')->references('customer_id')->on('customer');
    $table->timestamps();
});

