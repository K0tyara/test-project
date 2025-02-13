<?php

namespace App\Kernel\Resources;

abstract class JsonResource
{

    public static function json(array $data): string
    {
        return json_encode($data);
    }
}