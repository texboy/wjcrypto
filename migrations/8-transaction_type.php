<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('transaction_type', function ($table) {
    $table->id('transaction_type_id');
    $table->string('value');
});

Manager::table('transaction_type')->insert(
    [
        ['value' => 'deposit'],
        ['value' => 'withdraw'],
        ['value' => 'transfer']
    ]
);