<?php

namespace App\Kernel\Container;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Router\Router;
use App\Kernel\Session;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;

class Container
{
    public readonly Request $request;
    public readonly Router $router;

    public readonly Session $session;
    public readonly Redirect $redirect;
    public readonly View $view;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->session = new Session();
        $this->redirect = new Redirect();

        $this->request = Request::createFromGlobal();
        $this->request->setValidator(new Validator());
        $this->view = new View($this->session);
        $this->router = new Router($this->view, $this->request, $this->redirect, $this->session);
    }
}