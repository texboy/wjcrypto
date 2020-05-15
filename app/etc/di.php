<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

return [
    'Illuminate\Encryption\Encrypter' =>
        \DI\autowire()->constructor(getenv('APP_KEY'), 'AES-256-CBC')
];