<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\BelmarService;

class FormController extends Controller
{
    private array $rules = [
        'firstName' => ['required'],
        'lastName' => ['required'],
        'phone' => ['required'],
        'box_id' => ['required', 'integer'],
        'offer_id' => ['required', 'integer'],
        'countryCode' => ['required',],
        'language' => ['required',],
        'password' => ['required',],
    ];
    private BelmarService $belmarService;

    public function __construct()
    {
        $this->belmarService = new BelmarService();
    }

    public function store()
    {
        $validation = $this->request->validate($this->rules);

        if (!$validation) {
            foreach ($this->request->getErrors() as $field => $errors) {
                $this->session->set($field, $errors);
            }
        }
        $data = array_merge($this->request->post, [
            'ip' => $this->request->server['REMOTE_ADDR']
        ]);

        $response = $this->belmarService->addLead($data);

        $this->session->set('add_lead_response', $response);
        $this->redirect->to('/');

    }
}