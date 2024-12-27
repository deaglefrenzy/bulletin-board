<?php

namespace Suryo\Learn\Controller\Response;

abstract class Responses
{
    public int $statusCode;
    public string $message;

    public function __construct(int $statusCode, string $message)
    {
        $this->statusCode = $statusCode;
        $this->message = $message;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public abstract function getData();
}
