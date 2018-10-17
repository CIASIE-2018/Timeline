<?php

namespace App\Validation\Exception;

use Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException{

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Email already exist',
        ],
    ];

}