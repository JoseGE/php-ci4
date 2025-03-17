<?php

namespace App\Validations;

class PhoneRules
{
    public static function valid_phone($value)
    {
        return preg_match('/^(809|829|849)\d{7}$/', $value) ? true : false;
    }
}
