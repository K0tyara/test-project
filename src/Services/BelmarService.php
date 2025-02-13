<?php

namespace App\Services;

use App\DTO\BelmarResponseDTO;

class BelmarService
{
    private HttpClient $client;
    private $apiPoint = 'https://crm.belmar.pro/api/v1';
    private array $headers = [
        'token' => 'ba67df6a-a17c-476f-8e95-bcdb75ed3958',
        'Content-Type' => 'application/json'
    ];

    public function __construct()
    {
        $this->client = new HttpClient();
    }

    public function addLead($data): array|false
    {
        $data = $this->client->post($this->apiPoint . '/addlead', $data, $this->headers);
        if (isset($data['error'])) {
            return [
                'status' => 'false',
                'error' => $data['error']
            ];
        }

        return json_decode($data['data'], true);
    }

    public function getStatuses($data): array|false
    {
        $data = $this->client->post($this->apiPoint . '/getstatuses', $data, $this->headers);
        if (isset($data['error'])) {
            return [
                'status' => false,
                'error' => $data['error']
            ];
        }
        return json_decode($data['data'], true);
    }
}