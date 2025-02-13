<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->view->page('index');
    }
}