<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('customer_type', function ($table) {
    $table->id('customer_type_id');
    $table->string('name');
});

Manager::table('customer_type')->insert(
    [
        ['name' => 'pf'],
        ['name' => 'pj']
    ]
);