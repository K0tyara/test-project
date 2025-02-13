<?php

namespace App\Helpers;

use DateTime;

class DateTimeHelper
{

    public static function toValidFormat($datetime): string
    {
        return DateTime::createFromFormat('d/m/Y', $datetime)->format('Y-m-d');
    }
}