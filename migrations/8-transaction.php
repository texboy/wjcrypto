<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('transaction', function ($table) {
    $table->id('transaction_id');
    $table->text('amount');
    $table->unsignedBigInteger('transaction_type_id');
    $table->foreign('transaction_type_id')->references('transaction_type_id')->on('transaction_type');
    $table->unsignedBigInteger('sender_account_id');
    $table->foreign('sender_account_id')->references('account_id')->on('account');
    $table->unsignedBigInteger('receiver_account_id');
    $table->foreign('receiver_account_id')->references('account_id')->on('account');
    $table->timestamps();
});
