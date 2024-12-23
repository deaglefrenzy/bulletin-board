<?php

namespace Suryo\Learn\Controller\response;

class LoginResponses extends Responses
{
    private array $user = NULL;

    public function __construct(int $statusCode, string $message, array $user = NULL)
    {
        parent::__construct($statusCode, $message);
        $this->user = $user;
    }

    public function getData(): array
    {
        return $this->user;
    }
}
