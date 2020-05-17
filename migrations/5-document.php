<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('document', function ($table) {
    $table->id('document_id');
    $table->text('document_number');
    $table->unsignedBigInteger('customer_id');
    $table->foreign('customer_id')->references('customer_id')->on('customer');
    $table->unsignedBigInteger('document_type_id');
    $table->foreign('document_type_id')->references('document_type_id')->on('document_type');
    $table->timestamps();
});


