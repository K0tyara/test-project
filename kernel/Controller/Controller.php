<?php

namespace App\Kernel\Controller;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Session;
use App\Kernel\View\View;

abstract class Controller
{
    public readonly View $view;
    public readonly Request $request;

    public readonly Redirect $redirect;
    public readonly Session $session;

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function setView(View $view): void
    {
        $this->view = $view;
    }

    public function setRedirect(Redirect $redirect): void
    {
        $this->redirect = $redirect;
    }

    public function setSession(Session $session): void
    {
        $this->session = $session;
    }
}