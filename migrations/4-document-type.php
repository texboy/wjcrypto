<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('document_type', function ($table) {
    $table->id('document_type_id');
    $table->string('name');
});

Manager::table('document_type')->insert(
    [
        ['name' => 'rg'],
        ['name' => 'cpf'],
        ['name' => 'cnpj'],
        ['name' => 'ie']
    ]
);