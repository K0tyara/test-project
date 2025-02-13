<?php

namespace App\Controllers;

use App\Helpers\DateTimeHelper;
use App\Kernel\Controller\Controller;
use App\Services\BelmarService;

class TableController extends Controller
{
    private BelmarService $belmarService;
    private array $rules = [
        'limit' => ['required'],
        'date_from' => ['required',],
        'date_to' => ['required',],
    ];

    public function __construct()
    {
        $this->belmarService = new BelmarService();
    }

    public function index()
    {
        $this->view->page('table');
    }

    public function store()
    {
        if (!$this->request->validate($this->rules)) {
            foreach ($this->request->getErrors() as $field => $errors) {
                $this->session->set($field, $errors);
            }

            $this->redirect->to('/table/');
        }

        $data = $this->request->post;
        $data['date_from'] = DateTimeHelper::toValidFormat($data['date_from']) . ' 00:00:00';
        $data['date_to'] = DateTimeHelper::toValidFormat($data['date_to']) . ' 23:59:59';
        $response = $this->belmarService->getStatuses($data);

        $this->session->set('table_data', $response);
        $this->redirect->to('/table');
    }


}