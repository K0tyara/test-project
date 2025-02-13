<?php

namespace App\Middleware;

use App\Kernel\Middleware\AbstractMiddleware;
use App\Kernel\Resources\JsonResource;
use Exception;

class JsonMiddleware extends AbstractMiddleware
{


    public function handle(): void
    {
        if ($this->request->server['CONTENT_TYPE'] != 'application/json') {
            echo JsonResource::json([
                'message' => 'Bad request type'
            ]);
            exit();
        }
    }
}