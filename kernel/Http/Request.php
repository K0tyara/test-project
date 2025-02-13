<?php

namespace App\Kernel\Http;

use App\kernel\Validator\Validator;

readonly class Request
{
    private Validator $validator;

    public function __construct(
        public array $get,
        public array $post,
        public array $server,
        public array $cookie
    )
    {

    }

    public static function createFromGlobal(): static
    {
        return new static($_GET, $_POST, $_SERVER, $_COOKIE);
    }

    public function getUrl(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function setValidator(Validator $validator): void
    {
        $this->validator = $validator;
    }

    public function validate($rules): bool
    {
        $data = [];
        foreach ($rules as $key => $rule) {
            $data[$key] = $this->input($key);
        }
        return $this->validator->validate($data, $rules);
    }

    public function getErrors(): array
    {
        return $this->validator->errors();
    }

    public function input(string $key, $default = null)
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }
}