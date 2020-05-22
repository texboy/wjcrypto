<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('account', function ($table) {
    $table->id('account_id');
    $table->decimal('balance',13,4);
    $table->unsignedBigInteger('customer_id');
    $table->foreign('customer_id')->references('customer_id')->on('customer');
    $table->timestamps();
});


