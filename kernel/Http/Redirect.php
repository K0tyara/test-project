<?php

namespace App\Kernel\Http;

use JetBrains\PhpStorm\NoReturn;

class Redirect
{
    #[NoReturn] public function to(string $url): void
    {
        header("Location: $url");
        exit;
    }
}