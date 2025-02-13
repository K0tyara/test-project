<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session;

class View
{
    private Session $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @throws ViewNotFoundException
     */
    public function page(string $name): void
    {
        $path = APP_PATH . "/views/pages/$name.php";

        if (!file_exists($path)) {
            throw  new ViewNotFoundException("View $name not found.");
        }

        extract([
            'view' => $this,
            'session' => $this->session
        ]);
        include_once $path;
    }

    public function component(string $name): void
    {
        $path = APP_PATH . "/views/components/$name.php";

        if (!file_exists($path)) {
            throw  new ViewNotFoundException("Component $name not found.");
        }

        include_once $path;
    }
}