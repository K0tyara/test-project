<?php

namespace App\Services;

class HttpClient
{

    public function post(string $url, array $data, array $headers = []): array
    {
        $headers = array_map(
            fn($key, $value) => "$key: $value", array_keys($headers),
            array_values($headers)
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            return ['error' => curl_error($ch)];
//            return [
//                'status' => 'false',
//                'error' => curl_error($ch)
//            ];
        }
        return [
            'status' => $httpCode,
            'data' => $response
        ];
    }
}