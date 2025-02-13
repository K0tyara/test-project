<?php

namespace App\kernel\Middleware;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;

abstract class AbstractMiddleware
{
    public function __construct(
        protected Request  $request,
        protected Redirect $redirect
    )
    {
    }

    abstract public function handle(): void;
}